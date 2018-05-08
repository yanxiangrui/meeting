@extends('layouts.app') 

@section('content')

  
    
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">

                <div class="layui-card"> 
                    <div class="layui-card-header">酒店管理</div>

                    <div class="layui-card-body">

                        
                        <blockquote class="layui-elem-quote ">
                            <div class="test-table-reload-btn">
                                酒店名称：
                                <div class="layui-inline">
                                    <input class="layui-input" name="id" id="test-table-demoReload" autocomplete="off">
                                </div>
                                <button class="layui-btn" data-type="reload">搜索</button>
                            </div>
                        </blockquote>



                        <table class="layui-hide" id="test-table-form"></table>
                        
                        <script type="text/html" id="test-table-switchTpl">
                          <!-- 这里的 checked 的状态只是演示 -->
                          <input type="checkbox" name="sex" lay-skin="switch" lay-text="女|男" lay-filter="test-table-sexDemo"
                           value="@{{ d.id }}" data-json="@{{ encodeURIComponent(JSON.stringify(d)) }}" @{{ d.id == 10003 ? 'checked' : '' }}>
                        </script>
                         
                        <script type="text/html" id="test-table-checkboxTpl">
                          <!-- 这里的 checked 的状态只是演示 -->
                          <input type="checkbox" name="lock" title="锁定" lay-filter="test-table-lockDemo" 
                           value="@{{d.id}}" data-json="@{{ encodeURIComponent(JSON.stringify(d)) }}" @{{ d.id == 10006 ? 'checked' : '' }}>
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
                ,$ = layui.$;

            table.render({
                elem: '#test-table-form'
                ,url: '{{ route("hotels.index") }}'
                ,cellMinWidth: 80
                ,loading: true
                ,cols: [[
                    {type:'numbers'}
                    ,{type: 'checkbox'}
                    ,{field:'id', title:'ID', width:100, unresize: true, sort: true}
                    ,{field:'username', title:'用户名'}
                    ,{field:'city', title:'城市'}
                    ,{field:'wealth', title: '财富', minWidth:120, sort: true}
                    ,{field:'sex', title:'性别', width:85, templet: '#test-table-switchTpl', unresize: true}
                    ,{field:'lock', title:'是否锁定', width:110, templet: '#test-table-checkboxTpl', unresize: true}
                ]]
                ,page: true
            });
            
            //监听性别操作
            form.on('switch(test-table-sexDemo)', function(obj){
                var json = JSON.parse(decodeURIComponent($(this).data('json')));
                layer.tips(this.value + ' ' + this.name + '：'+ obj.elem.checked, obj.othis);
              
                json = table.clearCacheKey(json);
                console.log(json); //当前行数据
            });
            
            //监听锁定操作
            form.on('checkbox(test-table-lockDemo)', function(obj){
            var json = JSON.parse(decodeURIComponent($(this).data('json')));
                layer.tips(this.value + ' ' + this.name + '：'+ obj.elem.checked, obj.othis);
              
                json = table.clearCacheKey(json);
                console.log(json); //当前行数据
            }); 

        });
    </script>

@stop