<?php

//此控制器负责管理所有课程的入口
class Course extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        //下面一行输出调试信息
       	//$this->output->enable_profiler(TRUE);
    }

    public function index($courseid)
    {
        if (!empty($courseid) && $courseid>=1 && $courseid<=3)
        {
            $this->session->set_userdata(array('courseid'=>$courseid));
            redirect('/intro','refresh');
        }
        else return;
    }

    public function notice()
    {
        //以下一行仅作试验用
        $this->load->view('success');
    }
}
