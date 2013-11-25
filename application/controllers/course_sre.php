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
            $this->load->view('htmlhead');
            $this->load->view('student/course_sre_header');
            $this->load->view('student/course_sre');
            $this->load->view('footer');
        }
        else if ($role=="T")
        {
            $this->load->view('htmlhead');
            $this->load->view('teacher/course_sre_header');
            $this->load->view('teacher/course_sre');
            $this->load->view('footer');
        }
        else if ($role=="A")
        {
            $this->load->view('htmlhead');
            $this->load->view('assistant/course_sre_header');
            $this->load->view('assistant/course_sre');
            $this->load->view('footer');
        }
        else if ($role=="V")
        {
            $this->load->view('htmlhead');
            $this->load->view('visitor/course_sre_header');
            $this->load->view('visitor/course_sre');
            $this->load->view('footer');
        }
    }

    public function notice()
    {
        //以下一行仅作试验用
        $this->load->view('success');
    }
}
