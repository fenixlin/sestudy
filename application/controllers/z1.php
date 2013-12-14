<?php

//此控制器负责管理所有课程的入口
class Z1 extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }
	
	public function index($file_name)
    {
		$this->load->model('recourse_model');
		$this -> recourse_model->douwncount_plus($file_name);
    }
}
?>