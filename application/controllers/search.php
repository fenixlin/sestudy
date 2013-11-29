<?php

<<<<<<< HEAD
class Login extends CI_Controller {
=======
class Search extends CI_Controller {
>>>>>>> cb9353fb0d78fa69ec182181dc3bc72f3b3261dd

    public function __construct()
    {
        parent::__construct();
        $this->load->model('search_model');
        //下面一行输出调试信息
        //$this->output->enable_profiler(TRUE);
    }

    public function index()
    {
        //载入要用的函数库
        //$this->load->helper('form');
        $this->load->library('form_validation');
    }

}
