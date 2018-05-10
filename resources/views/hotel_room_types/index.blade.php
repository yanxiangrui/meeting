@extends('layouts.app') 

@section('content') 

    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">

                <div class="layui-card"> 
                    <div class="layui-card-header">酒店房型</div>

                    <div class="layui-card-body">                        

                        <blockquote class="layui-elem-quote ">
                            <div class="layui-btn-group">
                                <a lay-tips="添加" class="layui-btn layui-btn-normal layui-btn-sm" href="{{ route('hotel_room_types.create') }}" ><i class="layui-icon layui-icon-add-1">&#xe654;</i> 添加</a> 
                                <button lay-tips="删除" class="layui-btn layui-btn-danger layui-btn-sm"><i class="layui-icon layui-icon-delete"></i> 删除</button>
                            </div>

                            <hr /> 

                            <div class="test-table-reload-btn">
                                酒店名称：
                                <div class="layui-inline">
                                    <input class="layui-input" name="id" id="test-table-demoReload" autocomplete="off">
                                </div>

                                <button class="layui-btn" data-type="reload">搜索</button>
                            </div>

                        </blockquote>

                        <table class="layui-hide" id="hotel-table-form" lay-filter="hotel-table-form"></table>
                        
                        <script type="text/html" id="hotel-table-toolbar">
                            <div class="layui-btn-group">
                                <button lay-tips="修改" class="layui-btn layui-btn-normal layui-btn-xs hotel-edit" lay-event="edit"><i class="layui-icon layui-icon-edit">&#xe642;</i></button>
                                <button lay-tips="删除" class="layui-btn layui-btn-danger layui-btn-xs" lay-event="delete"><i class="layui-icon layui-icon-delete"></i></button>
                            </div>
                        </script> 
                    </div>
                </div>

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
        }).use(['index', 'table', 'form'], function () {
            var table = layui.table
                ,form = layui.form
                ,view = layui.view
                ,$ = layui.$;

            table.render({
                elem: '#hotel-table-form'
                ,url: '{{ route("hotel_room_types.index") }}'
                ,cellMinWidth: 80
                ,loading: true
                ,cols: [[
                    {type:'numbers'}
                    ,{type: 'checkbox'}
                    ,{field:'id', title:'ID', width:100, unresize: true, sort: true}
                    ,{
                        templet: function (d) {
                            return d.hotel.name;
                        }, 
                        title:'酒店名称'
                    }
                    ,{field:'title', title:'房型'} 
                    ,{
                        templet: function (d) {
                            return d.rooms.length; 
                        }, 
                        title:'房间/个'
                    }
                    ,{field:'bed_total', title:'床位/张'}
                    ,{field:'price', title:'房费/元'}
                    ,{field:'bed_price', title:'床位费/元'}
                    ,{field:'created_at', title:'添加时间', sort: true}                   
                    ,{field:'updated_at', title:'更新时间', sort: true}                   
                    ,{fixed: 'right', width:150, align:'center', toolbar: '#hotel-table-toolbar'} 
                ]]
                ,page: true 
            }); 

            table.on('sort(hotel-table-form)', function (obj) {
                table.reload('hotel-table-form', {
                    initSort: obj //记录初始排序，如果不设的话，将无法标记表头的排序状态。 layui 2.1.1 新增参数
                    ,where: { //请求参数（注意：这里面的参数可任意定义，并非下面固定的格式）
                        field: obj.field //排序字段
                        ,order: obj.type //排序方式
                    }
                });
            });

            //监听工具条
            table.on('tool(hotel-table-form)', function(obj){ //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
                var data = obj.data; //获得当前行数据
                var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
                var tr = obj.tr; //获得当前行 tr 的DOM对象

 
                if(layEvent === 'edit'){ //查看
                    location.href = "hotel_room_types/" + data.id + "/edit";
                } else if(layEvent === 'delete'){ //删除

                    layer.confirm('真的删除行么', function(index){
                        obj.del(); //删除对应行（tr）的DOM结构，并更新缓存
                        layer.close(index);
                        //向服务端发送删除指令
                        view.req({
                            url: 'hotel_room_types/' + data.id,
                            type: 'delete',
                            success: function (res) {
                                layer.msg('删除成功！', {icon: 1});                                       
                            }
                        });
                    });
                } 
            });
             
            // $('button.hotel-edit').on('click', function () {
            //     var activeRow = table.checkStatus('hotel-table-form');
            //     if (activeRow.data.length != 1) {
            //         view.error('请勾选一条需要修改的数据！', {type: 0, icon: 5,  offset: '15px'}); 
            //     } 
            // });
        });
    </script>

@stop