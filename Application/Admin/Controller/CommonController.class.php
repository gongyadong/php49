<?php
namespace Admin\Controller;
use  Think\Controller;
class CommonController extends Controller
{ 
     public function __construct()                             
	{
	     parent::__construct();
		 $admin= session("adname"); 
		 if(empty($admin)){
			 $this ->error("还没有登陆",U("Public/login"),3);
		 }
	 }
}