/**

 @Name：layuiAdmin 公共业务
 @Author：贤心
 @Site：http://www.layui.com/admin/
 @License：LPPL
    
 */
 
layui.define(function(exports){
  var $ = layui.$
  ,layer = layui.layer
  ,laytpl = layui.laytpl
  ,setter = layui.setter
  ,view = layui.view
  ,admin = layui.admin
  
  //公共业务的逻辑处理可以写在此处，切换任何页面都会执行
  //……
 
  //退出
  admin.events.logout = function(){
    document.getElementById('logout-form').submit();
  }; 


  /* 全局提示 start */
  if ('message' in app.tips) {
    view.popup({
      content: app.tips.message,
      offset: '15px', 
      time: app.tips.closeTime, 
      icon: 0,
      type: 0
    });
  }

  if ('success' in app.tips) {
    view.popup({
      content: app.tips.success,
      offset: '15px', 
      time: app.tips.closeTime,
      icon: 1,
      type: 0
    });
  }

  if ('danger' in app.tips) {
    view.popup({
      content: app.tips.danger,
      offset: '15px', 
      time: app.tips.closeTime,
      icon: 5,
      type: 0
    });
  }
  /* 全局提示 end */


  //对外暴露的接口
  exports('common', {});
});