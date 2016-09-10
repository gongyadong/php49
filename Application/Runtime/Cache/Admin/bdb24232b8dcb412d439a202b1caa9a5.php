<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/Public/admin/js/jquery.js"></script>
<script type="text/javascript">
$(function(){	
	//顶部导航切换
	$(".nav li a").click(function(){
		$(".nav li a.selected").removeClass("selected")
		$(this).addClass("selected");
	});
    //给推出按钮绑定点击事件
    $('.logOut').on('click',function(){
        $.get("<?php echo U('Public/logOut');?>", function(data) {
            if (data == 1) {
                top.location.href="<?php echo U('Public/login');?>";
            }
           
        });

    });	
})	
</script>


</head>

<body style="background:url(/Public/admin/images/topbg.gif) repeat-x;">

    <div class="topleft">
    <a href="#" target="_parent"><img src="/Public/admin/images/logo.png" title="系统首页" /></a>
    </div>
        
    
            
    <div class="topright">    
    <ul>
    <li><span><img src="/Public/admin/images/help.png" title="帮助"  class="helpimg"/></span><a href="#">帮助</a></li>
    <li><a href="#">关于</a></li>
    <li><a href="javascript:;" target="_parent" class='logOut' >退出</a></li>
    </ul>
     
    <div class="user">
    <span><?php echo (session('adname')); ?></span>
    </div>    
    
    </div>

</body>
</html>