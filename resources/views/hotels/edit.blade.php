@extends('layouts.app') 

@section('content')

    <div class="layui-fluid">
        <div class="layui-card">
            <div class="layui-card-header">
                修改酒店 
                <a href="{{ route('hotels.index') }}"><i class="layui-icon layui-icon-return"></i></a>
            </div>
            <div class="layui-card-body" style="padding: 15px;">
                <form class="layui-form" action="{{ route('hotels.update', $hotel) }}" method="POST" lay-filter="component-form-group">
                    {{ csrf_field() }}

                    {{ method_field('PUT') }}

                    <div class="layui-form-item">
                        <label class="layui-form-label">酒店名称</label>
                        <div class="layui-input-block">

                            <input type="text" name="name" placeholder="酒店名称" lay-verify="required" value="{{ old('name', $hotel->name) }}" class="layui-input">
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