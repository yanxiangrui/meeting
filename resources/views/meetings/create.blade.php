@extends('layouts.app') 

@section('content')

    <div class="layui-fluid">
        <div class="layui-card">
            <div class="layui-card-header">
                添加会议 
                <a href="{{ route('meetings.index') }}"><i class="layui-icon layui-icon-return"></i></a>
            </div>
            <div class="layui-card-body" style="padding: 15px;">
                <form class="layui-form" action="{{ route('meetings.store') }}" method="POST" lay-filter="component-form-group">
                    {{ csrf_field() }}

                    <div class="layui-form-item">
                        <label class="layui-form-label">会议名称</label>
                        <div class="layui-input-block">
                            <input type="text" name="name" placeholder="会议名称" lay-verify="required" value="{{ old('name') }}" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">会议描述</label>
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