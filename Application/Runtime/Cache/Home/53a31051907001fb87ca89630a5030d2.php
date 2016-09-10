<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/Public/home/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/Public/home/js/jquery.js"></script>

<script type="text/javascript">
$(function(){	
	//导航切换
	$(".menuson li").click(function(){
		$(".menuson li.active").removeClass("active")
		$(this).addClass("active");
	});
	
	$('.title').click(function(){
		var $ul = $(this).next('ul');
		$('dd').find('ul').slideUp();
		if($ul.is(':visible')){
			$(this).next('ul').slideUp();
		}else{
			$(this).next('ul').slideDown();
		}
	});
})	
</script>


</head>

<body style="background:#f0f9fd;">
	<div class="lefttop"><span></span>个人信息</div>
    
    <dl class="leftmenu">
        
    <dd>
    <div class="title">
    <span><img src="/Public/home/images/leftico01.png" /></span>补选信息
    </div>
    	<ul class="menuson">
    	<li><cite></cite><a href="index1.html" target="rightFrame">选报方法</a></li>
        <li><cite></cite><a href="index.html" target="rightFrame">补选课题</a></li>
        
        </ul>
        
    </dd>
    </dl>
    <dl class="leftmenu">
    <h1> &nbsp; &nbsp;姓名: <?php echo (session('username')); ?></h1>
    <h1> &nbsp; &nbsp;学号:<?php echo (session('stuid')); ?></h1>
    <h1> &nbsp; &nbsp;专业:<?php echo (session('xiid')); ?></h1>
    <h1><font color="red">最终志愿:</font></h1>
		<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?>&nbsp; &nbsp;标题: <?php echo ($vol["title"]); ?><br />
			&nbsp; &nbsp;导师: <?php echo ($vol["author"]); ?><br />
			&nbsp; &nbsp;内容: <?php echo ($vol["content"]); ?><br /><?php endforeach; endif; else: echo "" ;endif; ?>
</body>
</html>