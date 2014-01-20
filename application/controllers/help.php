<?php

class Help extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //下面一行输出调试信息
        //$this->output->enable_profiler(TRUE);
    }

    public function index()
    {   
        $role = $this->session->userdata('role');

        if ($role=="S")
        {
            $this->load->view('htmlhead');
            $this->load->view('help');
            $this->load->view('footer');
        }
        else if ($role=="T")
        {
            $this->load->view('htmlhead');
            $this->load->view('help');
            $this->load->view('footer');
        }
        else if ($role=="A")
        {
            $this->load->view('htmlhead');
            $this->load->view('help');
            $this->load->view('footer');
        }
        else if ($role=="V") //保证用户是经过了登陆的
        {
            $this->load->view('htmlhead');
            $this->load->view('help');
            $this->load->view('footer');
        }
    }
}