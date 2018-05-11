@extends('layouts.app') 

@section('content')

    <div class="layui-fluid">
        <div class="layui-card">
            <div class="layui-card-header">
                添加会议行程 
                <a href="{{ route('meeting_journeys.index') }}"><i class="layui-icon layui-icon-return"></i></a>
            </div>
            <div class="layui-card-body" style="padding: 15px;">
                <form class="layui-form" action="{{ route('meeting_journeys.store') }}" method="POST" lay-filter="component-form-group">
                    {{ csrf_field() }}

                    <div class="layui-form-item">
                        <label class="layui-form-label">会议</label>
                        <div class="layui-input-block"> 
                            <select name="meeting_id" lay-verify="" lay-filter="component-form-hotel" lay-search>
                                @foreach ($meetings as $meeting)
                                    <option value="{{ $meeting->id }}" @if ($meeting->id == old('meeting_id')) selected @endif >{{ $meeting->name }}</option> 
                                @endforeach                                
                            </select>  
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">行程名称</label>
                        <div class="layui-input-block">
                            <input type="text" name="name" placeholder="会议名称" lay-verify="required" value="{{ old('name') }}" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item"> 
                        <label class="layui-form-label">费用</label>
                        <div class="layui-input-block">
                            <input type="text" name="price" placeholder="￥" lay-verify="number" value="{{ old('price') }}" class="layui-input">
                        </div> 
                    </div>

                    <div class="layui-form-item"> 
                        <label class="layui-form-label">开始日期</label>
                        <div class="layui-input-block">
                            <input type="text" name="start_time" id="LAY-component-form-group-date-start" lay-verify="date" placeholder="yyyy-MM-dd" value="{{ old('start_time') }}" autocomplete="off" class="layui-input"> 
                        </div> 
                    </div> 

                    <div class="layui-form-item"> 
                        <label class="layui-form-label">结束日期</label>
                        <div class="layui-input-block">
                            <input type="text" name="end_time" id="LAY-component-form-group-date-end" lay-verify="date" placeholder="yyyy-MM-dd" value="{{ old('end_time') }}" autocomplete="off" class="layui-input"> 
                        </div> 
                    </div> 

                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">行程描述</label>
                        <div class="layui-input-block">
                            <textarea name="description" placeholder="请输入内容" class="layui-textarea">{{ old('description') }}</textarea>
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
        }).use(['index', 'form', 'laydate'], function () {
            var $ = layui.$
            ,admin = layui.admin
            ,element = layui.element
            ,layer = layui.layer
            ,laydate = layui.laydate
            ,form = layui.form;

            laydate.render({
              elem: '#LAY-component-form-group-date-start'
            });

            laydate.render({
              elem: '#LAY-component-form-group-date-end'
            });
            
            form.render(null, 'component-form-group'); 
        });
    </script>

@stop