<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/Public/Home/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Home/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Home/js/layer/layer.js"></script>
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
//第三志愿删除
   $(".last").click(function(){
			$.post("<?php echo U('Article/delete');?>",{ num: 3},function(msg){
				    if(msg !== 0){
					 window.location.reload(true);
				     }
			});
});
});
</script>


</head>


<body>

	<div class="place">
	<form method="post" action="<?php echo U('Stu/search');?>">
    <span>搜索：<input type="text"name="search"><input type="submit"value="搜索">
    </span>
    </form>
    </div>
    
    <div class="rightinfo">    
    <table class="tablelist">
    	<thead>
    	<tr>
        <th>编号<i class="sort"><img src="/Public/Home/images/px.gif" /></i></th>
        <th>论文题目</th>
        <th>审核老师</th>
        <th>学院</th>
        <th>操作</th>
        </tr>
        </thead>
		<!--第三志愿展示-->
        <tbody>
        <tr>
        <td><?php echo ($data["articleid"]); ?></td>
        <td><?php echo ($data["title"]); ?></td>
        <td><?php echo ($data["author"]); ?></td>
        <td><?php echo ($data["content"]); ?></td>
        <td>
		    <a href="javascript:;" class="last">删除</a>
		</td>
        </tr> 
        </tbody>
    </table>
    <div class="tip">
    	<div class="tiptop"><span>提示信息</span><a></a></div>
        
      <div class="tipinfo">
        <span><img src="/Public/Home/images/ticon.png" /></span>
        <div class="tipright">
        <p>是否确认对信息的修改 ？</p>
        <cite>如果是请点击确定按钮 ，否则请点取消。</cite>
        </div>
        </div>
        
        <div class="tipbtn">
        <input name="" type="button"  class="sure" value="确定" />&nbsp;
        <input name="" type="button"  class="cancel" value="取消" />
        </div>
    
    </div>
    
    
    
    
    </div>
    
    <script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>
</body>

</html>