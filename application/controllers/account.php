<?php

class Account extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('account_model');
        //下面一行输出调试信息
        //$this->output->enable_profiler(TRUE);
    }

    public function index()
    {
        $role = $this->session->userdata('role');
        if ($role=="T")
        {
            $this->load->view('htmlhead');
            $this->load->view('teacher/course_header');
            $this->load->view('teacher/account/index');
            $this->load->view('footer');
        }
    }

    public function operate($classid)
    {
        $role = $this->session->userdata('role');
        if ($role=="T")
        {
            $this->load->view('htmlhead');
            $this->load->view('teacher/course_header');
            $this->load->view('teacher/account/stulist');
            $this->load->view('footer');
        }
    }
}
