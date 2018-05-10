@extends('layouts.app') 

@section('content')

    <div class="layui-fluid">
        <div class="layui-card">
            <div class="layui-card-header">
                添加床位 
                <a href="{{ route('hotel_rooms.index') }}"><i class="layui-icon layui-icon-return"></i></a>
            </div>
            <div class="layui-card-body" style="padding: 15px;">
                <form class="layui-form" action="{{ route('hotel_rooms.update', $hotelRoom) }}" method="POST" lay-filter="component-form-group">
                    {{ csrf_field() }}

                    {{ method_field('PUT') }}

                    <div class="layui-form-item">
                        <label class="layui-form-label">酒店名称</label>
                        <div class="layui-input-block">	
                            <select name="hotel_id" lay-verify="" lay-filter="component-form-hotel" lay-search>
                            	@foreach ($hotels as $hotel)
                           			<option value="{{ $hotel->id }}" @if ($hotel->id == old('hotel_id', $hotelRoom->hotel_id)) selected @endif >{{ $hotel->name }}</option> 
                            	@endforeach                                
                            </select>  
                        </div>
                    </div>
        
                    <div class="layui-form-item">
                        <label class="layui-form-label">房型</label>
                        <div class="layui-input-block"> 
                            <select name="hotel_room_type_id" lay-verify="" lay-filter="component-form-hotel-room-type" lay-search></select>  
                        </div> 
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">房号</label>
                        <div class="layui-input-block">
                            <input type="text" name="hotel_number" lay-verify="required" placeholder="房号" value="{{ old('hotel_number', $hotelRoom->hotel_number) }}" class="layui-input">
                        </div>
                    </div>  

                    <div class="layui-form-item layui-layout-admin">
                        <div class="layui-input-block">
                            <div class="layui-footer" style="left: 0;">
                                <button class="layui-btn" lay-submit lay-filter="component-form-demo1">立即提交</button>
                                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
   
@stop 

@section('scripts')

    <script type="text/javascript">
        layui.config({
            base: '/layuiadmin/' //静态资源所在路径
        }).extend({
            index: 'lib/index' //主入口模块
        }).use(['index', 'form'], function () {
            var $ = layui.$
            ,admin = layui.admin
            ,element = layui.element
            ,layer = layui.layer
            ,laydate = layui.laydate
            ,view = layui.view
            ,form = layui.form;

            var hotel_room_type_id = {{ old('hotel_room_type_id', $hotelRoom->hotel_room_type_id) }}

            function roomtypeinit(id)
            {
                view.req({
                    url: "{{ route('hotel_room_types.index') }}",
                    type: 'get',
                    data: {
                        page: 1,
                        limit: 100,
                        hotel_id: id  
                    },
                    success: function (res) { 
                        if (res.code == 0) {
                            if (res.data.length == 0) {
                                layer.msg('当前酒店还没有添加房型呢！', {icon: 5}); 
                            }
                            $('select[lay-filter=component-form-hotel-room-type] > option').empty(); 
                            $.each(res.data, function (index) {
                                if (hotel_room_type_id == 0 && index === 0) {
                                    $('select[lay-filter=component-form-hotel-room-type]').append('<option selected value="' + this.id + '">' + this.title + '</option>');
                                } else if (hotel_room_type_id == this.id) {
                                    $('select[lay-filter=component-form-hotel-room-type]').append('<option selected value="' + this.id + '">' + this.title + '</option>');
                                } else {
                                    $('select[lay-filter=component-form-hotel-room-type]').append('<option value="' + this.id + '">' + this.title + '</option>');
                                }
                            });
                            form.render('select', 'component-form-group');
                        }
                    }
                }); 
            }

            form.on('select(component-form-hotel)', function(data){ 
                //向服务端发送删除指令
                roomtypeinit(data.value); 
            });  

            form.render(null, 'component-form-group');  
            roomtypeinit($('select[name=hotel_id]').val());
        });
    </script>

@stop