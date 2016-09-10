<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>网站流程</h1>
	在根目录下的index.php中默认值来控制,如图：<br /><img src="/Public/admin/images/0001.png"><br />
	'PE_MAX'为这次选题的课题最大人数<br />
	'STATUS'可以控制网站前端的状态。<br />
	<h1>操作流程</h1>
	修改状态常量，开启网站。<br />
	初选结束后，关闭前端，进行第一二三志愿的筛选。<br />
	注意：<font color=#ff6666>一二三志愿的筛选，只能点一次</font><br />
	筛选后，统计未选同学信息通知补选时间。
	补选是<font color=#ff6666>先到先得，不再进行筛选操作。</font><br />
	补选后还有未选的同学进行补选后筛选，如果还有未选人员，就再进行一次补选后筛选。<br />
	<h1>学生操作</h1>
	如果有学生信息需要修改就可以修改学生信息。
	<h1>信息输出</h1>
	先在EXCL表中控制好每列的宽度，然后在复制网表格内容 粘贴到EXCL中。
</body>
</html>