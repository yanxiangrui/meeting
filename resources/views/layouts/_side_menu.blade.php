<!-- 侧边菜单 -->
<div class="layui-side layui-side-menu">
    <div class="layui-side-scroll">
        <div class="layui-logo" lay-href="home/console.html">
            <span>{{ config('app.name', 'Laravel') }}</span>
        </div>
        <ul class="layui-nav layui-nav-tree" lay-shrink="all" id="LAY-system-side-menu" lay-filter="layadmin-system-side-menu">

            <li data-name="home" class="layui-nav-item">
                <a href="javascript:;" lay-tips="主页" lay-direction="2">
                    <i class="layui-icon layui-icon-home"></i>
                    <cite>主页</cite>
                </a> 

                <dl class="layui-nav-child">
                    <dd><a lay-href="{{ route('welcome') }}">控制台</a></dd> 
                </dl>
            </li>

            <li data-name="hotel" class="layui-nav-item">
                <a href="javascript: void(0);" lay-tips="酒店" lay-direction="2">
                    <i class="layui-icon">&#xe63f;</i>
                    <cite>酒店</cite> 
                </a> 

                <dl class="layui-nav-child">
                    <dd><a lay-href="{{ route('hotels.index') }}">酒店</a></dd>
                    <dd><a lay-href="{{ route('hotel_room_types.index') }}">房型</a></dd>
                    <dd><a lay-href="{{ route('hotel_rooms.index') }}">房间</a></dd>
                    <dd><a lay-href="{{ route('hotel_dinners.index') }}">餐费</a></dd>
                </dl>
            </li>

            <li data-name="meeting" class="layui-nav-item">
                <a href="javascript: void(0);" lay-tips="会议" lay-direction="2">
                    <i class="layui-icon layui-icon-yuandian"></i>
                    <cite>会议</cite> 
                </a> 
                
                <dl class="layui-nav-child">
                    <dd><a lay-href="{{ route('meetings.index') }}">会议</a></dd>
                    <dd><a lay-href="{{ route('meeting_journeys.index') }}">行程</a></dd>
                </dl>
            </li>


            <li data-name="order" class="layui-nav-item">
                <a href="javascript: void(0);" lay-tips="订单" lay-direction="2">
                    <i class="layui-icon layui-icon-yuandian"></i>
                    <cite>订单</cite> 
                </a> 

                <dl class="layui-nav-child">
                    <dd><a lay-href="">订单</a></dd>
                </dl>
            </li>


            <li data-name="member" class="layui-nav-item">
                <a href="javascript: void(0);" lay-tips="参会者" lay-direction="2">
                    <i class="layui-icon layui-icon-yuandian"></i>
                    <cite>参会者</cite> 
                </a> 

                <dl class="layui-nav-child">
                    <dd><a lay-href="{{ route('members.index') }}">参会者</a></dd>
                    <dd><a lay-href="{{ route('member_levels.index') }}">参会者级别</a></dd>
                </dl>
            </li>

            <li data-name="user" class="layui-nav-item">
                <a href="javascript:;" lay-tips="用户" lay-direction="2">
                    <i class="layui-icon layui-icon-user"></i>
                    <cite>用户</cite>
                </a>
                <dl class="layui-nav-child">
                    <dd>
                        <a href="javascript:;" onclick="layer.tips('开发中...', this);">网站用户</a>
                    </dd>
                    <dd>
                        <a href="javascript:;" onclick="layer.tips('开发中...', this);">后台管理员</a>
                    </dd>
                    <dd>
                        <a href="javascript:;" onclick="layer.tips('开发中...', this);">角色管理</a>
                    </dd>
                </dl>
            </li>

            <li data-name="set" class="layui-nav-item">
                <a href="javascript:;" lay-tips="设置" lay-direction="2">
                    <i class="layui-icon layui-icon-set"></i>
                    <cite>设置</cite>
                </a>
                <dl class="layui-nav-child">
                    <dd>
                        <a href="javascript:;">系统设置</a>
                        <dl class="layui-nav-child">
                            <dd><a lay-href="set/system/website.html">网站设置</a></dd>
                            <dd><a lay-href="set/system/email.html">邮件服务</a></dd>
                        </dl>
                    </dd>
                    <dd>
                        <a href="javascript:;">我的设置</a>
                        <dl class="layui-nav-child">
                            <dd><a lay-href="set/user/info.html">基本资料</a></dd>
                            <dd><a lay-href="{{ route('users.resetpwd') }}">修改密码</a></dd>
                        </dl>
                    </dd>
                </dl>
            </li>
        </ul>
    </div>
</div>