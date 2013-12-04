<?php

class Outline_edit extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('outline_model');
        //$this->load->helper('url');
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
            $this->load->view('teacher/outline_edit');
            $this->load->view('footer');
        }
        else if ($role=="A")
        {
            $this->load->view('htmlhead');
            $this->load->view('assistant/course_header');
            $this->load->view('assistant/outline_edit');
            $this->load->view('footer');
        }
    }
}

