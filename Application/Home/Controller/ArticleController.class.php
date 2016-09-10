<?php
namespace Home\Controller;
use Think\Page;

class ArticleController extends CommonController
{
    public function content()
    {
//实例化控制器
       $model = M("Article");
//查询论文题所有的数据和
	   $count = $model -> count();
//实例化分页类,并传总数,每页显示的目录条数到分页类,
	   $page  = new Page($count,10);
//每页显示的页码
	   $page -> rollPage = 6;
//最后一页不显示数字
	   $page -> lastSuffix = false;
	   $page -> setConfig("prev","上一页");
	   $page -> setConfig("next","下一页");
	   $page -> setConfig("first","首页");
	   $page -> setConfig("last","末页");
//组装url地址
	   $show  = $page -> show();
//查询所有的数据并分页
       $data  = $model -> limit($page -> firstRow,$page -> listRows) 
		               -> select();
	   $this -> assign("show",$show);    //展示分页数据到页面
       $this -> assign("data",$data);    //展示详细信息到页面
       $this -> display();
    }
//文章首页
	public function index()
	{
	    $this -> display();
	}
	//主页左侧的志愿展示
	public function left()
	{
		     $userModel = M("Stuuser");
             $arr =$userModel -> where("userid=".session("userid")) -> find();
		     $model = M("Article");
		     $zy1    = $arr["zy1"];
			 $zy2    = $arr["zy2"];
			 $zy3    = $arr["zy3"];
		     $data1  = $model -> where("articleid = $zy1") -> select();
		     $data2  = $model -> where("articleid = $zy2") -> select();
		     $data3  = $model -> where("articleid = $zy3") -> select();
		     $this -> assign("data1",$data1);
		     $this -> assign("data2",$data2);
		     $this -> assign("data3",$data3);
		     $this -> display();   
	}
    
//添加第一志愿
    public function firstTaskOk()
	{
	    $id = I("post.id");                //获取文章id
		$model = M("Article");             //实例化
//查询论文信息并写入stuuser表
		$data  = $model -> field("article.articleid AS ZY1,user.jsid AS JS1")
			            -> table("pe_article AS article,pe_user AS user")
			            -> where(" article.author = user.username AND article.articleid = $id")
			            -> find();
//转化post数据的字段与数据库完全相同
		$data["UserID"] = session("userid");
		$data["StuID"]  = session("stuid");
		$data["ZY1"]    =$data["zy1"];
		$data["JS1"]    =$data["js1"];
//并将字段存入session
		session("zy1",$data["zy1"]);
//实例化
		$userModel = M("Stuuser");
//实现更新方法
		$result = $userModel -> save($data);
		echo $result;
	}

	//添加第二志愿
    public function twoTaskOk()
	{
	    $id = I("post.id");                  //获取id
		$model = M("Article");               //实例化
//查询添加志愿的详细信息,并写入stuuser表
		$data  = $model -> field("article.articleid AS zy2,user.jsid AS js2")
			            -> table("pe_article AS article,pe_user AS user")
			            -> where(" article.author = user.username AND article.articleid = $id")
			            -> find();
//优化post数组数据,使字段完全与数据库相同
		$data["UserID"] = session("userid");
		$data["StuID"]  = session("stuid");
		$data["ZY2"]    =$data["zy2"];
		$data["JS2"]    =$data["js2"];
//将选取的志愿字段值存入session
		session("zy2",$data["zy2"]);
//实例化
		$userModel = M("Stuuser");
//实现更新
		$result = $userModel -> save($data);
		echo $result;
	}
	
	//添加第三志愿
    public function lastTaskOk()
	{
	    $id = I("post.id");                     //获取提交的id
		$model = M("Article");                  //实例化
//查询添加志愿的详细信息
		$data  = $model -> field("article.articleid AS zy3,user.jsid AS js3")
			            -> table("pe_article AS article,pe_user AS user")
			            -> where(" article.author = user.username AND article.articleid = $id")
			            -> find();
//优化post数组数据使其完全与数据库字段相同
		$data["UserID"] = session("userid");
		$data["StuID"]  = session("stuid");
		$data["ZY3"]    =$data["zy3"];
		$data["JS3"]    =$data["js3"];
//将选取的志愿数据存入session
		session("zy3",$data["zy3"]);
//实例化
		$userModel = M("Stuuser");
//执行更新方法
		$result = $userModel -> save($data);
		echo $result;
	}
	
//页面展示志愿
//展示第一志愿
	public function firstTask()
	{
		   $userid = session("userid");            //获取用户id
		   $userModel = M("Stuuser");              //实例化
//根据条件查询用户的详细信息
           $arr =$userModel -> where("userid=".session("userid")) -> find();
//判断第一志愿是否存在
		   if($arr["zy1"]==0){
		     echo "你的第一志愿还没有选择";
		   }else{
		     $model = M("Article");                //实例化
		     $zy    = $arr["zy1"];                 //查询到的第一志愿数据复制给变量
//根据条件查询论文的详细信息
		     $data  = $model -> where("articleid = $zy") -> find();
		     $this -> assign("data",$data);
		     $this -> display();
		   }
		   
	}
//展示第二志愿
	public function twoTask()
	{
		   $userid = session("userid");
		   $userModel = M("Stuuser");
           $arr =$userModel -> where("userid=".session("userid")) -> find();
		   if($arr["zy2"]==0){
		     echo "你的第二志愿还没有选择";
		   }else{
		     $model = M("Article");
		     $zy    = $arr["zy2"];
		     $data  = $model -> where("articleid = $zy") -> find();
		     $this -> assign("data",$data);
		     $this -> display();
		   }
		   
	}
//展示第三志愿
	public function lastTask()
	{
		   $userid = session("userid");
		   $userModel = M("Stuuser");
           $arr =$userModel -> where("userid=".session("userid")) -> find();
		   if($arr["zy3"]==0){
		     echo "你的第三志愿还没有选择";
		   }else{
		     $model = M("Article");
		     $zy    = $arr["zy3"];
		     $data  = $model -> where("articleid = $zy") -> find();
		     $this -> assign("data",$data);
		     $this -> display();
		   }
		   
	}

    

    //搜索
	public function search(){
		$model = M('Article');
		$i=I('post.search');
		//echo $i;die;
		$where = "`author` LIKE '%$i%' or `title` like '%$i%'";
		$data = $model -> where($where)
		               -> select();
		$this -> assign('data',$data);
		$this ->display(content);
	}

	//删除方法
	public function delete()
	{
	    $num = I("post.num");                  //获取post传值
		$model = M("Stuuser");                 //实例化
		$post["UserID"] = session("userid");   //使其字段完全与数据库相同
		if($num == 1){                         //判断是否删除第一志愿
		   $post["ZY1"] = 0;
		   $post["JS1"] = 0;
		   session("zy1",0); 
		   //echo dump($post);die;
		   $result = $model -> save($post);
           echo $result;
		}elseif($num == 2){                     //判断是否删除第二志愿
		   $post["ZY2"] = 0;
		   $post["JS2"] = 0;
		   session("zy2",0);
		   $result = $model -> save($post);
           echo $result;
		}elseif($num == 3){                     //判断是否删除第三志愿
		   $post["ZY3"] = 0;
		   $post["JS3"] = 0;
		   session("zy3",0);
		   $result = $model -> save($post);
           echo $result;
		}
	}

}