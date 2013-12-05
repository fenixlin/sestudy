<?php

class Intro extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('intro_model');
        //下面一行输出调试信息
        $this->output->enable_profiler(TRUE);
    }

    public function index()
    {   
        if ($this->input->post())
        {
            $role = $this->intro_model->update();
        }

        $role = $this->session->userdata('role');
        if ($role=="S")
        {
            $this->load->view('htmlhead');
            $this->load->view('student/course_header');
            $this->load->view('student/intro');
            $this->load->view('footer');
        }
        else if ($role=="T")
        {
            $this->load->view('htmlhead');
            $this->load->view('teacher/course_header');
            $this->load->view('teacher/intro');
            $this->load->view('footer');
        }
        else if ($role=="A")
        {
            $this->load->view('htmlhead');
            $this->load->view('assistant/course_header');
            $this->load->view('assistant/intro');
            $this->load->view('footer');
        }
        else if ($role=="V") //保证用户是经过了登陆的
        {
            $this->load->view('htmlhead');
            $this->load->view('visitor/course_header');
            $this->load->view('visitor/intro');
            $this->load->view('footer');
        }
    }
}

