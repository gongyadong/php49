<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/Public/Home/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/Public/Home/js/jquery.js"></script>
<script type="text/javascript">
$(function(){	
	//顶部导航切换
	$(".nav li a").click(function(){
		$(".nav li a.selected").removeClass("selected")
		$(this).addClass("selected");
	})	
})	
</script>


</head>

<body style="background:url(/Public/Home/images/topbg.gif) repeat-x;">

    <div class="topleft">
    <a href="main.html" target="_parent"><img src="/Public/Home/images/logo.png" title="系统首页" /></a>
    </div>
        
    <ul class="nav">
    <li><a href="<?php echo U('Article/content');?>" target="rightFrame" class="selected"><img src="/Public/Home/images/icon01.png" title="工作台" /><h2>论文课题</h2></a></li>
    <li>
	    <a href="index1.html" target="rightFrame">
		  <img src="/Public/Home/images/icon02.png" title="模型管理" />
		  <h2>操作流程</h2>
		</a>
	</li>
	<!--单独的第一志愿显示-->
    <li>
	    <a href="<?php echo U('Article/firstTask');?>"  target="rightFrame">
		    <img src="/Public/Home/images/icon03.png" title="模块设计" />
			<h2>第一志愿</h2>
		</a>
	</li>
	<!--单独的第二志愿显示-->
    <li>
	     <a href="<?php echo U('Article/twoTask');?>"  target="rightFrame">
		      <img src="/Public/Home/images/icon04.png" title="常用工具" />
			  <h2>第二志愿</h2>
		 </a>
	</li>
	<!--单独的第三志愿显示-->
    <li>
	     <a href="<?php echo U('Article/lastTask');?>" target="rightFrame">
		      <img src="/Public/Home/images/icon05.png" title="文件管理" />
			  <h2>第三志愿</h2>
		 </a>
	</li>
    </ul>
            
    <div class="topright">    
    <ul>
    <li><span><img src="/Public/Home/images/help.png" title="帮助"  class="helpimg"/></span><a href="#">帮助</a></li>
    <li><a href="#">关于</a></li>
	<!--退出功能-->
    <li><a href="<?php echo U('Index/logOut');?>" target="_parent">退出</a></li>
    </ul>
    
    </div>

</body>
</html>