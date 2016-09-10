<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>jquery简单的注册表单验证代码 - 站长素材</title>

<link rel="stylesheet" href="/Public/Home/css1/style.css">

<script type="text/javascript" src="/Public/Home/js1/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="/Public/Home/js1/easyform.js"></script>

</head>
<body>
<br>
<div class="form-div">
    <form id="reg-form" action="<?php echo U('register');?>" method="post">

        <table>  
            <tr>
                <td>学号</td>
                <td><input name="StuID" type="text" class="stuid" easyform="length:2-16" message="学号必须为10位" easytip="disappear:lost-focus;theme:blue;"></td>
            </tr>      
            <tr>
                <tr>
                <td>用户名</td>
                <td><input name="UserName" type="text" id="username" easyform="length:2-16" message="用户名必须为真是姓名" easytip="disappear:lost-focus;theme:blue;"></td>
            </tr>            
            </tr>
            <tr>
                <td>密码</td>
                <td><input name="UserPassword" type="password" id="psw1" easyform="length:6-16;" message="密码必须为6—16位" easytip="disappear:lost-focus;theme:blue;"></td>
            </tr>
            <tr>
                <td>确认密码</td>
                <td><input name="psw2" type="password" id="psw2" easyform="length:6-16;equal:#psw1;" message="两次密码输入要一致" easytip="disappear:lost-focus;theme:blue;"></td>
            </tr>
            <tr>
                <td>专业</td>
                <td><input name="XIID" type="text" id="nickname" easyform="length:2-16" message="请填写你的专业" easytip="disappear:lost-focus;theme:blue;"></td>
            </tr>            
        </table>

		<div class="buttons">
			<input value="注 册" type="submit" style="margin-right:20px; margin-top:20px;">
			<input value="我有账号，我要登录" type="button" style="margin-right:45px; margin-top:20px;" class="login">
        </div>
		
        <br class="clear">
    </form>
</div>

<script type="text/javascript">
$(document).ready(function(){
	$('#reg-form').easyform();
});

$(function(){
  $(".stuid").blur(function(){
       var stu_id = $(this)[0].value;
	   if(stu_id.length !== 10){
	       alert("学号填写格式错误,请准确填写10位数字");
		   return;
	   }
	   $.post("<?php echo U('ajax');?>",{stuid : stu_id},function(msg){
	          if(msg != 1123){
			     alert("学号不存在");
			  }
	   });
});
});
</script>
<div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';">
<p>适用浏览器：IE8、360、FireFox、Chrome、Safari、Opera、傲游、搜狗、世界之窗. </p>
<p>来源：<a href="http://sc.chinaz.com/" target="_blank">站长素材</a></p>
</div>
</body>
</html>