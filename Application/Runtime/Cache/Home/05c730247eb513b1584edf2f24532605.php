<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>论文答辩选题</title>
<link href="/Public/home/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/home/js/jquery.js"></script>
<script type="text/javascript" src="/Public/home/js/layer/layer.js"></script>



</head>


<body>

    <div class="place">
    <form method="post" action="<?php echo U('Secondary/search');?>">
    <span>搜索：<input type="text"name="search"><input type="submit"value="搜索">
    </span>
    </form>
    </div>
    
    <div class="rightinfo">    
    <table class="tablelist">
        <thead>
        <tr>
        <th>编号<i class="sort"><img src="/Public/home/images/px.gif" /></i></th>
        <th>论文题目</th>
        <th>导师</th>
        <th>学院</th>
        <th>人数</th>
        <th>志愿</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><tr>
        <td><?php echo ($vol['articleid']); ?></td>
        <td><?php echo ($vol["title"]); ?></td>
        <td><?php echo ($vol["author"]); ?></td>
        <td><?php echo ($vol["content"]); ?></td>
        <td><?php echo ($vol["count"]); ?></td>
        <td>
            <?php if($vol['articleid'] != session('zyst')): ?><a href="<?php echo U('Secondary/choice',array('id'=>$vol['articleid']));?>">选择</a>
            <?php else: ?>
             <font color="red">已选</font><?php endif; ?>
        </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    
   
    <div class="pagin"><br />
        <div class="message"><p><?php echo ($show); ?></p></div>
    </div>
    </div>
    
    <script type="text/javascript">
    $('.tablelist tbody tr:odd').addClass('odd');
    </script>
</body>

</html>