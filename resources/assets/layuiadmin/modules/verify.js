layui.define(['form'], function(exports){
	var $ = layui.$
    	form = layui.form;

    form.verify({

    	nickname: function(value, item){ //value：表单的值、item：表单的DOM对象
    	  	if(!new RegExp("^[a-zA-Z0-9_\u4e00-\u9fa5\\s·]+$").test(value)){
    	    	return '用户名不能有特殊字符';
    	  	}

    	  	if(/(^\_)|(\__)|(\_+$)/.test(value)){
    	    	return '用户名首尾不能出现下划线\'_\'';
    	  	}

    	  	if(/^\d+\d+\d$/.test(value)){
    	    	return '用户名不能全为数字';
    	  	}
    	}
    	
    	//我们既支持上述函数式的方式，也支持下述数组的形式
    	//数组的两个值分别代表：[正则匹配、匹配不符时的提示文字]
    	,pass: [
    	  	/^[\S]{6,16}$/
    	  	,'密码必须6到16位，且不能出现空格'
    	]
    	
    	//确认密码
    	,repass: function(value){
    	  	if(value !== $('#LAY_password').val()){
    	    	return '两次密码输入不一致';
    	  	}
    	}
 
    });


 

 
    //对外暴露的接口
    exports('verify', form);
});