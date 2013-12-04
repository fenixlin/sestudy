<?php

//此控制器负责管理所有课程的入口
class Tinfo_edit extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('tinfo_model');
        //下面一行输出调试信息
       	$this->output->enable_profiler(TRUE);
    }

    public function index()
    {
    	$role = $this->session->userdata('role');

        if ($role=="T")
        {
            $this->load->view('htmlhead');
            $this->load->view('teacher/course_header');
            $this->load->view('teacher/tinfo_edit');
            $this->load->view('footer');
        }
        else if ($role=="A")
        {
            $this->load->view('htmlhead');
            $this->load->view('assistant/course_header');
            $this->load->view('assistant/tinfo_edit');
            $this->load->view('footer');
        }
    }
}

