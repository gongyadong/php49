<?php
namespace Home\Controller;                          //名字空间

use Think\Controller;                               //引用父类

class StuUserController extends Controller
{
    public function register()                       //注册页面
	{
		
	//判断表单是否提交
		if(IS_POST){
           $model  = M("stuuser");                      //实例化模型
           $post   = I("post.");                     //获取数据
		   $data   =$model -> where("StuID=".$post['StuID'])->find();
		   unset($post["psw2"]);                     //将第二次密码删除
		   unset($post["UserName"]);                 //将post数据中的不用的用户名删除
	//密码进行加密
		   $post["UserPassword"]=md5($post["UserPassword"]);
    //获取最后一次登录IP
		   $post["LastLoginIP"] =$_SERVER["SERVER_ADDR"];
    //获取主键ID
           $post["UserID"] = $data["userid"];
		   $result = $model -> save($post);         //执行添加注册方法,主要修改密码
		   if($result){
		   //注册成功
               $this -> success("注册成功,请登陆吧",U("Index/index"),3);
		   }else{
		   //注册失败
		       $this -> error("注册失败",U('register'),3);
		   }
		}else{
	       $this -> display();                       //表单没有提交,视图展示
		}
	}

	public function ajax()
	{
	       $post   = I("post.");                     //获取数据
		   $data=substr($post["stuid"],0,4);         //截取字符串判断是否是学生
		   echo $data;die;                           //输出截取后的结果
	}
//用户名密码验证是否是学校学生
	public function check()
	{
	     $post = I("post.");                         //获取数据
		 $post["StuID"] = $post["stuid"];            //修改POST字段跟数据库完全相同
		 $post["UserName"] = $post["username"];
		 //实例化模型
		 $model = M("Stuuser");
		 //查询用户名,密码是否正确
		 $result = $model -> where($post) -> find();
		 echo $result;
	}
}