<?php

class All_teacher extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        //下面一行输出调试信息
        //$this->output->enable_profiler(TRUE);
    }

    public function index()
    {   
        $data['results'] = $this->user_model->get_all_teacher();

        $role = $this->session->userdata('role');

        if ($role=="S")
        {
            $this->load->view('htmlhead');
            $this->load->view('all_teacher', $data);
            $this->load->view('footer');
        }
        else if ($role=="T")
        {
            $this->load->view('htmlhead');
            $this->load->view('all_teacher', $data);
            $this->load->view('footer');
        }
        else if ($role=="A")
        {
            $this->load->view('htmlhead');
            $this->load->view('all_teacher', $data);
            $this->load->view('footer');
        }
        else if ($role=="V") //保证用户是经过了登陆的
        {
            $this->load->view('htmlhead');
            $this->load->view('all_teacher', $data);
            $this->load->view('footer');
        }
    }
}

