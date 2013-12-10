<?php

//此控制器负责管理所有课程的入口
class Tinfo extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('tinfo_model');
        //下面一行输出调试信息
       	$this->output->enable_profiler(TRUE);
    }

    public function index()
    {
        if ($this->input->post())
        {
            $this->tinfo_model->update();
        }

    	$role = $this->session->userdata('role');

        if ($role=="S")
        {
            $this->load->view('htmlhead');
            $this->load->view('student/course_header');
            $this->load->view('student/tinfo');
            $this->load->view('footer');
        }
        else if ($role=="T")
        {
            $this->load->view('htmlhead');
            $this->load->view('teacher/course_header');
            $this->load->view('teacher/tinfo');
            $this->load->view('footer');
        }
        else if ($role=="A")
        {
            $this->load->view('htmlhead');
            $this->load->view('assistant/course_header');
            $this->load->view('assistant/tinfo');
            $this->load->view('footer');
        }
        else if ($role=="V") //保证用户是经过了登陆的
        {
            $this->load->view('htmlhead');
            $this->load->view('visitor/course_header');
            $this->load->view('visitor/tinfo');
            $this->load->view('footer');
        }
    }

    public function edit()
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

