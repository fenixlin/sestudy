<?php

class Logout extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //下面一行输出调试信息
        //$this->output->enable_profiler(TRUE);
    }

    public function index()
    {
        $this->session->sess_destroy();
        redirect('/login','refresh');
    }
}

