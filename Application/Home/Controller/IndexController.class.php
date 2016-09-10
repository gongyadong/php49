<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    private $status;
	public function __construct()
	{
		$c   = $this->status = STATUS;
		parent::__construct();
		switch ($c) {
			case 'close':
			exit("<h2>sorry,the system is not open</h2>");
			case'secondary':
			default:
                #进入登录
				break;
		}
	}
    public function index()                                  //首页(登陆窗口)展示
	{

           $this -> display();
	}

    public function login()                                 //登陆方法
	{
	       //接受数据
		   $post = I("post.");
		   $post["UserPassword"] = md5($post["UserPassword"]);
		   //实例化模型
		   $model = M("Stuuser");
		   //查询用户名,密码是否正确
		   $result = $model -> where($post) -> find();
		   //如果正确
		   if($result){
			  //将用户信息存入session
			  session("stuid",$result["stuid"]);
			  session("userid",$result['userid']);
			  session("username",$result['username']);
			  session("xiid",$result['xiid']);
			  session("sex",$result['sex']);
			  session("adddate",$result['adddate']);
			  session("logintimes",$result['logintimes']);
			  session("lastloginip",$result["lastloginip"]);
			  session("zy1",$result['zy1']);
			  session("zy2",$result['zy2']);
			  session("zy3",$result['zy3']);
			  session("zyst",$result['zyst']);
		      //登陆成功
			  $this -> success("登陆成功,欢迎".session("username")."同学",U("Tie/index"),3);
		   }else{
		      //登陆失败
			  $this -> error("用户名或密码不正确",U("index"),3);
		   }
	 }

    public function loginOut()                                 //退出
	{     
	     session(null);                                        //清除保存在session里面的数据
		 if(!session("?stuid")){
		    //退出成功
			$this -> success("退出成功",U('index'),3);
		 }
	}
}