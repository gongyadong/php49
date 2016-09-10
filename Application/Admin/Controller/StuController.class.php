<?php
namespace Admin\Controller;
class StuController extends CommonController{
	public function index(){
		$model = M('stuuser');
		$data = $model -> field('userid,username,stuid,xiid,zy1,zy2,zy3,lastloginip')
		               -> select();
		$this -> assign('data',$data);
		$this ->display();
	}
	public function search(){
		$model = M('stuuser');
		$i=I('post.search');
		//echo $i;die;
		$where = "`username` LIKE '%$i%' or `stuid` like '%$i%' or `xiid` like '%$i%'";
		$data = $model -> field('userid,username,stuid,xiid,zy1,zy2,zy3,lastloginip')
		               -> where($where)
		               -> select();
		$this -> assign('data',$data);
		$this ->display(index);
	}
	public function del(){
		$get = I('get.id');
		$model = M('stuuser');
		$rsc = $model -> delete($get);
		if($rsc){
			$this-> success('删除成功',U('index'),3);
		}else{
			$this-> success('删除失败',U('index'),3);
		}
	}
	public function alter(){
		$get = I('get.id');
		$model = M('stuuser');
		$data = $model -> where("userid=$get") ->select();
		//dump($data);
		$this -> assign('data',$data);
		$this ->display();
	}
	public function fix(){
		$post = I('post.');
		$post['userpassword'] = md5($post['userpassword']);
	    $userid=$post['userid'];
	   // unset ($post['userid']);
		$model =M('stuuser');
		$info = array(
			'UserName'=>$post['username'],
			'XIID' => $post['xiid'],
			'StuId' => $post['stuid'],
			'UserPassword' => $post['userpassword'],
			);
		$rsc = $model -> where("userid= '$userid'") -> save($info);
		if($rsc){

			$this-> success('修改成功',U('index'),3);
		}else{
			$this-> success('修改失败',U('index'),3);
		}
	}
	
}