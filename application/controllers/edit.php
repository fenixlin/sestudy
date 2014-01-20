<?php

class Edit extends CI_Controller {

    public function __construct()
    {
        parent::__construct();      
        $this->load->model('assignment_model');
        //下面一行输出调试信息
        //$this->output->enable_profiler(TRUE);
    }

    public function index()
    {
        if ($this->input->post())
        {
            $this->assignment_model->update();
        }
        $role = $this->session->userdata('role');
        if ($role=="T")
        {
            $this->load->view('htmlhead');
            $this->load->view('teacher/course_header');
            $this->load->view('teacher/assignment/homeworklist');
            $this->load->view('footer');
        }
    }
}