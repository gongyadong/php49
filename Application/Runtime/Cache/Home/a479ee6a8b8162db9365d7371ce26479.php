<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>论文答辩选题</title>
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
//第一志愿添加
   $(".first").click(function(){
        if(window.confirm("确定要选为第一志愿吗???")){
		    var article_id = $(this).attr("article_id");
			$.post("<?php echo U('firstTaskOk');?>",{id : article_id},function(msg){
				 if(msg !== 0){
					 window.location.reload(true);
                 }
			});
		}
	
  });
//第二志愿添加
   $(".two").click(function(){
        if(window.confirm("确定要选为第二志愿吗???")){
		    var article_id = $(this).attr("article_id");
			$.post("<?php echo U('Article/twoTaskOk');?>",{id : article_id},function(msg){
				 if(msg !== 0){
					 window.location.reload(true);
				  }
			});
		}
	
  });
//第三志愿添加
   $(".last").click(function(){
        if(window.confirm("确定要选为第三志愿吗???")){
		    var article_id = $(this).attr("article_id");
			$.post("<?php echo U('Article/lastTaskOk');?>",{id : article_id},function(msg){
				    if(msg !== 0){
					 window.location.reload(true);
				  }
			});
		}
	
  });
});
</script>


</head>


<body>

	<div class="place">
	<form method="post" action="<?php echo U('Article/search');?>">
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
        <th>第一志愿</th>
		<th>第二志愿</th>
		<th>第三志愿</th>
        </tr>
        </thead>
        <tbody>
		<!--循环获取论文内容并输出-->
        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><tr>
        <td><?php echo ($vol['articleid']); ?></td>
        <td><?php echo ($vol["title"]); ?></td>
        <td><?php echo ($vol["author"]); ?></td>
        <td><?php echo ($vol["content"]); ?></td>
		<td>
		    <?php if($vol['articleid'] != session('zy1')): ?><a href="javascript:;" class="first" article_id="<?php echo ($vol["articleid"]); ?>">选择</a>
            <?php else: ?>
			 <font color="red">已选</font><?php endif; ?>
		</td>
		<td>
		    <?php if($vol['articleid'] != session('zy2')): ?><a href="javascript:;" class="two" article_id="<?php echo ($vol["articleid"]); ?>">选择</a>
            <?php else: ?>
			 <font color="red">已选</font><?php endif; ?>
		</td>
		<td>
		    <?php if($vol['articleid'] != session('zy3')): ?><a href="javascript:;" class="last" article_id="<?php echo ($vol["articleid"]); ?>">选择</a>
            <?php else: ?>
			 <font color="red">已选</font><?php endif; ?>
		</td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    
   <!--分页-->
    <div class="pagin"><br />
    	<div class="message"><p><?php echo ($show); ?></p></div>
    </div>
    </div>
    
    <script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>
</body>

</html>