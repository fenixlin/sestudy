<?php

class Course_SRE extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        //下面一行输出调试信息
       	$this->output->enable_profiler(TRUE);
    }

    public function index()
    {
    	$role = $this->session->userdata('role');

        if ($role=="S")
        {
        	$this->load->view('student\course_sre');
        }
        else if ($role=="T")
        {
        	$this->load->view('teacher\course_sre');
        }
        else if ($role=="A")
        {
        	$this->load->view('assistant\course_sre');
        }
        else if ($role=="V")
        {
        	$this->load->view('visitor\course_sre');	
        }
    }

}
