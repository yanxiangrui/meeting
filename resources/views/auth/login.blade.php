@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('layuiadmin/style/login.css') }}" media="all">
@stop

@section('content')

<div class="layadmin-user-login layadmin-user-display-show" id="LAY-user-login" style="display: none;">

    <div class="layadmin-user-login-main">
        <div class="layadmin-user-login-box layadmin-user-login-header">
            <h2>管理面板</h2>
            <p>zleader 管理模板系统</p>
        </div>

        <div class="layadmin-user-login-box layadmin-user-login-body layui-form">

            <form class="form" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}

                <div class="layui-form-item">
                    <label class="layadmin-user-login-icon layui-icon layui-icon-user" for="LAY-user-login-email"></label>
                    <input type="text" name="email" id="LAY-user-login-email" lay-verify="required" placeholder="用户名" value="{{ old('email') }}" class="layui-input">
                </div>

                <div class="layui-form-item">
                    <label class="layadmin-user-login-icon layui-icon layui-icon-password" for="LAY-user-login-password"></label>
                    <input type="password" name="password" id="LAY-user-login-password" lay-verify="required" placeholder="密码" value="{{ old('password') }}" class="layui-input">
                </div>

                <div class="layui-form-item">
                    <div class="layui-row">
                        <div class="layui-col-xs7">
                            <label class="layadmin-user-login-icon layui-icon layui-icon-vercode" for="LAY-user-login-vercode"></label>
                            <input type="text" name="captcha" id="LAY-user-login-vercode" lay-verify="required" placeholder="图形验证码" class="layui-input">
                        </div>
                        <div class="layui-col-xs5">
                            <div style="margin-left: 10px;">
                                <img class="layadmin-user-login-codeimg" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()"  title="点击图片重新获取验证码">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="layui-form-item" style="margin-bottom: 20px;">
                    <input type="checkbox" name="remember" lay-skin="primary" title="记住我">
                    <a href="{{ route('password.request') }}" class="layadmin-user-jump-change layadmin-link" style="margin-top: 7px;">忘记密码？</a>
                </div>

                <div class="layui-form-item">
                    <button class="layui-btn layui-btn-fluid" lay-submit lay-filter="LAY-user-login-submit">登 入</button>
                </div> 
            </form>
        </div>
    </div>
  
    <div class="layui-trans layadmin-user-login-footer">     
        <p>COPYRIGHT © 2018 {{ config('app.name', '') }}. ALL RIGHTS RESERVED.</p>
        <p>技术支持 <a href="http://zleader.cn/" target="_blank">竹鹿科技</a></p> 
    </div>

</div>

@endsection

@section('scripts')
    <script>
        layui.config({
            base: '/layuiadmin/' //静态资源所在路径
        }).extend({
            index: 'lib/index' //主入口模块
        }).use(['index', 'user'], function(){
            var $ = layui.$
            ,form = layui.form
            ,view = layui.view;
            
            form.render();  

            @include('common.error') 
        });
    </script>
@stop
