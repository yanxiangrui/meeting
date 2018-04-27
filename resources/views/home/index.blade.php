@extends('layouts.app')

@section('content')
  
  <div id="LAY_app"> 
      <div class="layui-layout layui-layout-admin"> 

          @include('layouts._header')

          @include('layouts._side_menu')

          @include('layouts._pagetabs') 

          <!-- 主体内容 -->
          <div class="layui-body" id="LAY_app_body">
            <div class="layadmin-tabsbody-item layui-show">    
              <iframe src="{{ route('welcome') }}" frameborder="0" class="layadmin-iframe"></iframe>
            </div>
          </div>
          <!-- 辅助元素，一般用于移动设备下遮罩 -->
          <div class="layadmin-body-shade" layadmin-event="shade"></div>
      </div>
  </div>

@stop


@section('scripts')
  
  <script type="text/javascript">
    layui.config({
      base: '/layuiadmin/' //静态资源所在路径
    }).extend({
      index: 'lib/index' //主入口模块
    }).use('index'); 
  </script> 
@stop