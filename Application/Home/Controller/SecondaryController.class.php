<?php 
namespace Home\Controller;

class SecondaryController extends CommonController
{
	private $status;
	private $max;
	public function __construct()
	{
		$c   = $this->status = STATUS;
		$this-> max = PE_MAX;
		parent::__construct();
		if($c != "secondary"){
			exit("<h2>补选尚未开放，如有疑问请联系管理员</h2>");
		}

	}
	public function main()
	{
        $this -> display();
	}
	public function index(){
		$m = $this->max;
		$c   = $this->status;
		$model =M('article');
		$data = $model -> where('count<'.$m) -> select();
		$this -> assign('data',$data);
		$this -> display();
	}
	public function search(){
		$m = $this->max;
		$model = M('Article');
		$i=I('post.search');
		if($i!=""){
			$where = $m .">count and `author` LIKE '%$i%' or `title` like '%$i%'";
			$data = $model -> where($where)
			               -> select();
			$this -> assign('data',$data);
			$this ->display(index); 
	    }else{
	    	$data = "";
			$this -> assign('data',$data);
			$this ->display(index); 
	    }
	}
	public function choice(){
		$get =I('get.id');
		$model= M('stuuser');
		$id = session("stuid");
		$sql = "update pe_stuuser set zyst=$get where stuid = $id";
		$sq = "update pe_article set count = count+1 where articleid=$get";
		$model ->execute($sq);
		$rsc = $model->execute($sql);
		if($rsc){
			$url = U('main');
			$script = "<script>top.location.href='$url';</script>";
			echo $script;
			session("zyst",$get);
		}else{
			$this -> error('补选失败，请联系管理员',U('index'),3);
		}
	}
	public function left(){
		//dump($_SESSION);
		$model =M('article');
        $arr =$model -> where("articleid=".session("zyst")) -> find();
        $data[0] =$arr; 
        $this -> assign('data',$data);
        $this -> display();
	}
	public function loginOut()                                 //退出
	{     
	     session(null);                                        //清除保存在session里面的数据
		 if(!session("?stuid")){
		    //退出成功
			$this -> success("退出成功",U('Index/index'),3);
		 }
	}
}