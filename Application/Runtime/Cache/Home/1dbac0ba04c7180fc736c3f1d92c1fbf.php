<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/Public/Home/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/Public/Home/js/jquery.js"></script>

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
	<div class="lefttop"><span></span>学生信息</div>
    <!--学生的详细信息-->
    <dl class="leftmenu">
		 <h1> &nbsp; &nbsp;姓名: <?php echo (session('username')); ?></h1>
		<h1> &nbsp; &nbsp;学号:<?php echo (session('stuid')); ?></h1>
		<h1> &nbsp; &nbsp;专业:<?php echo (session('xiid')); ?></h1>
		<h1> &nbsp; &nbsp;登陆时间:<?php echo (date("Y-m-d H:i:s",session('logintimes'))); ?></h1>
		<h1> &nbsp; &nbsp;登陆IP:<?php echo (session('lastloginip')); ?></h1>
		<h1>第1志愿</h1>
		</div><?php if(is_array($data1)): $i = 0; $__LIST__ = $data1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?>&nbsp; &nbsp;标题: <?php echo ($vol["title"]); ?><br />
			&nbsp; &nbsp;导师: <?php echo ($vol["author"]); ?><br />
			&nbsp; &nbsp;内容: <?php echo ($vol["content"]); ?><br /><?php endforeach; endif; else: echo "" ;endif; ?>
		<h1>第2志愿</h1>
		</div><?php if(is_array($data2)): $i = 0; $__LIST__ = $data2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?>&nbsp; &nbsp;标题: <?php echo ($vol["title"]); ?><br />
			&nbsp; &nbsp;导师: <?php echo ($vol["author"]); ?><br />
			&nbsp; &nbsp;内容: <?php echo ($vol["content"]); ?><br /><?php endforeach; endif; else: echo "" ;endif; ?>
		<h1>第3志愿</h1>
			</div><?php if(is_array($data3)): $i = 0; $__LIST__ = $data3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?>&nbsp; &nbsp;标题: <?php echo ($vol["title"]); ?><br />
			&nbsp; &nbsp;导师: <?php echo ($vol["author"]); ?><br />
			&nbsp; &nbsp;内容: <?php echo ($vol["content"]); ?><br /><?php endforeach; endif; else: echo "" ;endif; ?>
    </dl>
</body>
</html>