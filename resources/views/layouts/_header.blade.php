<div class="layui-header">
  
    <ul class="layui-nav layui-layout-left">
        <li class="layui-nav-item layadmin-flexible" lay-unselect>
            <a href="javascript:;" layadmin-event="flexible" title="侧边伸缩">
                <i class="layui-icon layui-icon-shrink-right" id="LAY_app_flexible"></i>
            </a>
        </li>

        <li class="layui-nav-item layui-hide-xs" lay-unselect>
            <a href="http://zleader.cn" target="_blank" title="前台">
                <i class="layui-icon layui-icon-website"></i>
            </a>
        </li>

        <li class="layui-nav-item" lay-unselect>
            <a href="javascript:;" layadmin-event="refresh" title="刷新">
                <i class="layui-icon layui-icon-refresh-3"></i>
            </a>
        </li>
    </ul>

    <ul class="layui-nav layui-layout-right" lay-filter="layadmin-layout-right">
        <li class="layui-nav-item" lay-unselect>
            <a lay-href="app/message/index.html" layadmin-event="message" lay-text="消息中心">
                <i class="layui-icon layui-icon-notice"></i>  
                <span class="layui-badge-dot"></span>
            </a>
        </li>

        <li class="layui-nav-item layui-hide-xs" lay-unselect>
            <a href="javascript:;" layadmin-event="theme">
                <i class="layui-icon layui-icon-theme"></i>
            </a> 
        </li>

        <li class="layui-nav-item layui-hide-xs" lay-unselect>
            <a href="javascript:;" layadmin-event="note">
                <i class="layui-icon layui-icon-note"></i>
            </a>
        </li>

        <li class="layui-nav-item" lay-unselect>
            <a href="javascript:;">
                <cite> {{ Auth::user()->name }} </cite>
            </a>
            <dl class="layui-nav-child">
                <dd><a lay-href="set/user/info.html">基本资料</a></dd>
                <dd><a lay-href="{{ route('users.resetpwd') }}">修改密码</a></dd>
                <hr>
                <dd layadmin-event="logout" style="text-align: center;"><a>退出</a></dd>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
            </dl>
        </li>

        <li class="layui-nav-item layui-hide-xs" lay-unselect>
            <a href="javascript:;" layadmin-event="about"><i class="layui-icon layui-icon-more-vertical"></i></a>
        </li>
        
        <li class="layui-nav-item layui-show-xs-inline-block layui-hide-sm" lay-unselect>
            <a href="javascript:;" layadmin-event="more"><i class="layui-icon layui-icon-more-vertical"></i></a>
        </li>
    </ul>
</div>