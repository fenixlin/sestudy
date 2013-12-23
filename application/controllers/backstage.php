<?php

class Backstage extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //下面一行输出调试信息
        //$this->output->enable_profiler(TRUE);
    }

    public function index()
    {
        $this->load->view('backstage/mainpage');
    }

    public function teachers()
    {
        $this->load->view('backstage/teachers');
    }

    public function courses()
    {
        $this->load->view('backstage/courses');
    }
}

