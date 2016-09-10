<?php

namespace Home\Controller;

use       Think\Controller;

class CommonController extends Controller
{ 
     public function __construct()                             
	{
	     parent::__construct();
		 $stuid = session("stuid"); 
		 if(empty($stuid)){
			 $this ->error("还没有登陆",U("Index/index"),3);
		 }
	 }
}