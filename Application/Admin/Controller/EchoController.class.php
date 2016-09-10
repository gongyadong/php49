<?php
namespace Admin\Controller;
class EchoController extends CommonController
{
	public function index(){
		$model = M();
		$sql = "select articleid,author,title from pe_article  where count != 0 order by articleid";
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
		// dump($data);die;
		$this -> assign('data',$data);
		$this -> display();
	}
	public function exportExcel($expTitle,$expCellName,$expTableData){
        $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
        $fileName = '2017级';//or $xlsTitle 文件名称可根据自己情况设定
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);
        vendor("PHPExcel.PHPExcel");
       
        $objPHPExcel = new PHPExcel();
        $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');
        
        $objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
       // $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle.'  Export time:'.date('Y-m-d H:i:s'));  
        for($i=0;$i<$cellNum;$i++){
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'2', $expCellName[$i][1]); 
        } 
          // Miscellaneous glyphs, UTF-8   
        for($i=0;$i<$dataNum;$i++){
          for($j=0;$j<$cellNum;$j++){
            $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+3), $expTableData[$i][$expCellName[$j][0]]);
          }             
        }  
        
        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
        header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  
        $objWriter->save('php://output'); 
        exit;   
    }
/**
     *
     * 导出Excel
     */
    function expUser(){//导出Excel
        $xlsName  = "User";
        $xlsCell  = array(
        array('articleid','序号'),
        array('author','导师'),
        array('title','题目'),
        array('stu','学生'),   
        );
        $model = M();
		$sql = "select articleid,author,title from pe_article  where count != 0 order by articleid";
		$xlsData = $model -> query($sql);
		$sq = "select zyst,username from pe_stuuser";
		$num = $model -> query($sq);
		foreach($data as $key => $value){
			foreach($num as $k => $val){
				if($value['articleid'] == $val['zyst']){
					$str .= $val['username'];
					$str .=".";
				}
				$xlsData[$key]['stu'] = $str;
			}$str = "";	
		}
        $this->exportExcel($xlsName,$xlsCell,$xlsData);     
    }
}