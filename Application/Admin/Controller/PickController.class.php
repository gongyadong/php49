<?php 
namespace Admin\Controller;
use Think\Controller;
class PickController extends Controller
{
	private $max;
	public function __construct(){
      $this-> max = PE_MAX;
  }
	private function db(){
		mysql_connect('localhost','root','123456');
		mysql_select_db('wly');
		mysql_query('set names utf8');
	}
	public function first(){
		$this -> db();
		$m = $this -> max;
		$sql = "select ZY1,count(ZY1)as count1 from pe_stuuser where zyst=0 group by ZY1 having count1<=$m";
		$data = mysql_query($sql);
		while($arr = mysql_fetch_assoc($data)){
		   $val = $arr['ZY1'];
		   $sq = "update pe_stuuser set zyst=$val where zy1 = $val ";
		   mysql_query($sq);
		}
		$sql ="select zy1,count(1)  from pe_stuuser group by zy1 having count(1)>$m";
		$data = mysql_query($sql);
		while($arr = mysql_fetch_assoc($data)){
			$val = $arr['zy1'];
			$sq = "select userid from pe_stuuser where zy1 = $val order by rand() limit $m";
			$num = mysql_query($sq);
			while($arr=mysql_fetch_assoc($num)){
				$va = $arr['userid'];
				$s = "update pe_stuuser set zyst = $val where userid = $va";
				mysql_query($s);
			}
		}
		echo '<h2>第一志愿筛选完成,请进行第二志愿筛选</h2>';
	 }
	public function second()
	{
		$this -> db();
		$m = $this -> max;
		$sql = "select ZY2,count(ZY2)as count1 from pe_stuuser where zyst=0  group by ZY2 having count1<=$m";
		$data = mysql_query($sql);
		while($arr = mysql_fetch_assoc($data)){
		   $val = $arr['ZY2'];
		   $sq = "update pe_stuuser set zyst=$val where zy2 = $val and $m <=(select zyst,count(1) from pe_stuuser group by zyst)";
		   mysql_query($sq);
		}
		$sql ="select zy2,count(1)  from pe_stuuser where $m <= (select zyst,count(1) from pe_stuuser group by zyst)group by zy2 having count(1)>$m";
		$data = mysql_query($sql);
		while($arr = mysql_fetch_assoc($data)){
			$val = $arr['zy2'];
			$sq = "select userid from pe_stuuser where zy2 = $val order by rand() limit $m";
			$num = mysql_query($sq);
			while($arr=mysql_fetch_assoc($num)){
				$va = $arr['userid'];
				$s = "update pe_stuuser set zyst = $val where userid = $va";
				mysql_query($s);
			}
		}

		echo '<h2>第二志愿筛选完成,请进行第三志愿筛选</h2>';
	}
	public function third()
	{
		$this -> db();
		$m = $this -> max;
		$sql = "select ZY3,count(ZY3)as count1 from pe_stuuser where zyst=0 group by ZY3 having count1<=$m";
		$data = mysql_query($sql);
		while($arr = mysql_fetch_assoc($data)){
		   $val = $arr['ZY3'];
		   $sq = "update pe_stuuser set zyst=$val where zy3 = $val and $m <=(select zyst,count(1) from pe_stuuser group by zyst)";
		   mysql_query($sq);
		}
		$sql ="select zy3,count(1)  from pe_stuuser where $m<= (select zyst,count(1) from pe_stuuser group by zyst)group by zy3 having count(1)>$m";
		$data = mysql_query($sql);
		while($arr = mysql_fetch_assoc($data)){
			$val = $arr['zy3'];
			$sq = "select userid from pe_stuuser where zy3 = $val order by rand() limit $m";
			$num = mysql_query($sq);
			while($arr=mysql_fetch_assoc($num)){
				$va = $arr['userid'];
				$s = "update pe_stuuser set zyst = $val where userid = $va";
				mysql_query($s);
			}
		}
		$ql = "select ZYst,count(ZYst)as count from pe_stuuser group by ZYst ";
		$rec = mysql_query($ql);
		while($arr=mysql_fetch_assoc($rec)){
			$q = "update pe_article set count = ".$arr['count']." where articleid = ".$arr['ZYst'];
			
			mysql_query($q);
		}
		echo '<h2>第三志愿筛选完成,请进行志愿补选</h2>';
	}
	public function random()
	{
		$this -> db();
		$m = $this -> max;
		$sql = "select ZYst,count(ZYst)as count from pe_stuuser group by ZYst having count<$m";
		$rsc = mysql_query($sql);
		while($arr1 = mysql_fetch_assoc($rsc)){
			$a[]=$arr1;
		}
		$sq = "select userid from pe_stuuser where zyst = 0";
		$rsc = mysql_query($sq);
		while($arr2 = mysql_fetch_assoc($rsc)){
        	$b[]=$arr2;
		}
		$i=0;
		while($b[$i]){
			$c = array_rand($a);
			if($a[$c][count]<$m){
				$sql = "update pe_stuuser set zyst=".$a[$c]['ZYst']." where userid = ".$b[$i]['userid'];
				mysql_query($sql);;
                $a[$c][count]+=1;
			}
			$i++;
		}
		echo '<h2>补选后筛选完成</h2>';
	}
}
