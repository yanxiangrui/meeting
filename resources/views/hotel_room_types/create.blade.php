@extends('layouts.app') 

@section('content')

    <div class="layui-fluid">
        <div class="layui-card">
            <div class="layui-card-header">
                添加房型 
                <a href="{{ route('hotel_room_types.index') }}"><i class="layui-icon layui-icon-return"></i></a>
            </div>
            <div class="layui-card-body" style="padding: 15px;">
                <form class="layui-form" action="{{ route('hotel_room_types.store') }}" method="POST" lay-filter="component-form-group">
                    {{ csrf_field() }}

                    <div class="layui-form-item">
                        <label class="layui-form-label">酒店名称</label>
                        <div class="layui-input-block">	
                            <select name="hotel_id" lay-verify="" lay-search>
                            	@foreach ($hotels as $hotel)
                           			<option value="{{ $hotel->id }}" @if ($hotel->id == old('hotel_id')) selected @endif >{{ $hotel->name }}</option> 
                            	@endforeach                                
                            </select>  
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">房型名称</label>
                        <div class="layui-input-block">
                            <input type="text" name="title" lay-verify="required" placeholder="房型名称" value="{{ old('title') }}" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">床位数量</label>
                        <div class="layui-input-block">
                            <input type="radio" name="bed_total" value="1" title="1张" @if (1 == old('bed_total')) checked @endif >
                            <input type="radio" name="bed_total" value="2" title="2张" @if (2 == old('bed_total')) checked @endif >
                            <input type="radio" name="bed_total" value="3" title="3张" @if (3 == old('bed_total')) checked @endif >
                            <input type="radio" name="bed_total" value="4" title="4张" @if (4 == old('bed_total')) checked @endif >
                            <input type="radio" name="bed_total" value="5" title="5张" @if (5 == old('bed_total')) checked @endif >
                            <input type="radio" name="bed_total" value="6" title="6张" @if (6 == old('bed_total')) checked @endif >
                        </div>
                    </div> 

                    <div class="layui-form-item"> 
                        <label class="layui-form-label">房间费用</label>
                        <div class="layui-input-inline">
                            <input type="text" name="price" placeholder="￥" lay-verify="number" value="{{ old('price') }}" class="layui-input">
                        </div> 
                    </div>

                    <div class="layui-form-item"> 
                        <label class="layui-form-label">床位费用</label>
                        <div class="layui-input-inline">
                            <input type="text" name="bed_price" placeholder="￥" lay-verify="number" value="{{ old('bed_price') }}" class="layui-input">
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
            ,form = layui.form;
            
            form.render(null, 'component-form-group'); 
        });
    </script>

@stop