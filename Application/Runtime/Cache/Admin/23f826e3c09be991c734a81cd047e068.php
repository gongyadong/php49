<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h2>修改学生信息</h2>
	<?php foreach($data as $value) { ?>
		<form method="post" action="<?php echo U('Stu/fix');?>">
				姓名:<input type="text" name="username" value="<?php echo $value['username']?>">
				学号:<input type="text" name="stuid" value="<?php echo $value['stuid']?>">
				专业:<input type="text" name="xiid" value="<?php echo $value['xiid']?>">
				     <input type="hidden" name="userid" value="<?php echo $value['userid']?>">
				密码:<input type="text" name="userpassword" value="">
				提交:<input type="submit"value="提交修改">
		</form>
    <?php } ?>
	</volist>
</body>
</html>