<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/admin/js/jquery.js"></script>

<script type="text/javascript">
$(document).ready(function(){
  $(".click").click(function(){
  $(".tip").fadeIn(200);
  });
  
  $(".tiptop a").click(function(){
  $(".tip").fadeOut(200);
});

  $(".sure").click(function(){
  $(".tip").fadeOut(100);
});

  $(".cancel").click(function(){
  $(".tip").fadeOut(100);
});

});
</script>


</head>


<body>

	<div class="place"><form method="post" action="<?php echo U('Stu/search');?>">
    <span>搜索：<input type="text"name="search"><input type="submit"value="搜索">
    </span>
    </form>
    </div> 
    <a href="out.html">导出数据</a>
    <div class="rightinfo">
    </div>
    
    
    <table class="tablelist">
    	<thead>
    	<tr>
        <th>编号<i class="sort"><img src="/Public/admin/images/px.gif" /></i></th>
        <th>姓名</th>
        <th>学号</th>
        <th>专业</th>
        <th>志愿1</th>
        <th>志愿2</th>
        <th>志愿3</th>
        <th>ip地址</th>
        <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo ($vol["userid"]); ?></td>
            <td><?php echo ($vol["username"]); ?></td>
            <td><?php echo ($vol["stuid"]); ?></td>
            <td><?php echo ($vol["xiid"]); ?></td>
            <td><?php echo ($vol["zy1"]); ?></td>
            <td><?php echo ($vol["zy2"]); ?></td>
            <td><?php echo ($vol["zy3"]); ?></td>
            <td><?php echo ($vol["lastloginip"]); ?></td>
            <td>
            <a href="javascript:if(confirm('确认删除吗?'))window.location='<?php echo U('Stu/del',array('id'=>$vol['userid']));?>
'"class="tablelink">删除</a> |
            <a href="<?php echo U('Stu/alter',array('id'=>$vol['userid']));?>" class="tablelink"> 修改</a>
            </td>

            </tr><?php endforeach; endif; else: echo "" ;endif; ?>    
        </tbody>
    </table>
</body>

</html>