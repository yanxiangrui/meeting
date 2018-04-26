@extends('layouts.app')

@section('content')
  
<div class="layui-fluid">

    <div class="layadmin-tips">
        <i class="layui-icon" face>&#xe664;</i>
        <div class="layui-text">
            <h1>
                <span class="layui-anim layui-anim-loop layui-anim-">4</span> 
                <span class="layui-anim layui-anim-loop layui-anim-rotate">0</span> 
                <span class="layui-anim layui-anim-loop layui-anim-">4</span>
            </h1>
        </div>
    </div>

</div>


@stop


@section('scripts')
  
<script>
    layui.config({
        base: '/layuiadmin/' //静态资源所在路径
    }).extend({
        index: 'lib/index' //主入口模块
    }).use(['index']);
</script> 

@stop