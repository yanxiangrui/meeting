layui.define(['form'], function(exports){
    var form = layui.form;

    form.verify({
        pass: [
          /^[\S]{6,12}$/
          ,'密码必须6到12位，且不能出现空格'
        ] 
    });
  
  
    //对外暴露的接口
    exports('zlFormVerify', form);
});