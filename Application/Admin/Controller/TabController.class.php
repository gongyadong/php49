<?php
namespace Admin\Controller;
class TabController extends CommonController
{
	public function table()
	{
		$model = M();
		$sql = "select articleid,author,title from pe_article order by articleid";
		$data = $model -> query($sql);
		$sq = "select zyst,username from pe_stuuser";
		$num = $model -> query($sq);
		foreach($data as $key => $value){
			foreach($num as $k => $val){
				
				if($value['articleid'] == $val['zyst']){
					
					$str .= $val['username'];
					$str .=".";
				}
				$data[$key]['stu'] = $str;
			}$str = "";	
		}
		$this -> assign('data',$data);
		$this -> display();
	}
	public function tabforno()
	{
		$model = M('stuuser');
		$sql = "select username,stuid,xiid,zy1,zy2,zy3 from pe_stuuser where zyst = 0";
		$data = $model -> query($sql);
		$this -> assign('data',$data);
		$this -> display();
	}
}
