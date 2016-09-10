<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>欢迎登录后台管理系统</title>
<link href="/Public/home/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/Public/home/js/jquery.js"></script>
<script src="/Public/home/js/cloud.js" type="text/javascript"></script>

<script language="javascript">
	$(function(){
    $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
	$(window).resize(function(){  
    $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
    })  
});  
</script> 

</head>

<body style="background-color:#1c77ac; background-image:url(/Public/home/images/light.png); background-repeat:no-repeat; background-position:center top; overflow:hidden;">



    <div id="mainBody">
      <div id="cloud1" class="cloud"></div>
      <div id="cloud2" class="cloud"></div>
    </div>  


<div class="logintop">    
    <span>欢迎登录后台管理界面平台</span>    
    <ul>
    <li><a href="#">回首页</a></li>
    <li><a href="#">帮助</a></li>
    <li><a href="#">关于</a></li>
    </ul>    
    </div>
    
    <div class="loginbody">
    
    <span class="systemlogo"></span> 
       
    <div class="loginbox">
    <form method="post" action="<?php echo U('login');?>">
    <ul>
    <li>
	     <input name="StuID" type="text" class="loginuser" placeholder="学号" onclick="JavaScript:this.value=''"/>
	</li>
    <li>
	     <input name="UserPassword" type="password" class="loginpwd" placeholder="密码" onclick="JavaScript:this.value=''"/>
	</li>
    <li>
	           <input type="submit" class="loginbtn" value="登陆">
		  <label>
		       <input name="" type="checkbox" value="" checked="checked" />记住密码
		  </label>
		  <label>
		       <a href="/index.php/Admin/Public/login">管理登录</a>
		  </label>
	<label><a href="<?php echo U('StuUser/register');?>">点击注册</a></label>
	</li>
    </ul>
    </form>
    
    </div>
    
    </div>
    
    
    
    <div class="loginbm">版权所有  2013  <a href="http://www.mycodes.net">源码之家</a> </div>
	
    
</body>

</html>