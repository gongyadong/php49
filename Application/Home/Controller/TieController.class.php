<?php
namespace Home\Controller;
use Think\Page;

class TieController extends CommonController
{
	private $status;
	public function __construct()
	{
		$c   = $this->status = STATUS;
		switch ($c) {
			case 'primary':
				$this->redirect('Article/index');
				break;
			
			case 'secondary':
				$this->redirect('Secondary/main');
				break;
		}
	}
	public function index(){}
}