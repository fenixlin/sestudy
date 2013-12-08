<?php

class Main extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('notice_model');
        //下面一行输出调试信息
        $this->output->enable_profiler(TRUE);
    }

    public function index()
    {
        if ($this->input->post())
        {
            $this->notice_model->update();
        }
        
    	$role = $this->session->userdata('role');

        if ($role=="S")
        {
            $this->load->view('htmlhead');
        	$this->load->view('student/index_header');
            $this->load->view('student/index');
            $this->load->view('footer');
        }
        else if ($role=="T")
        {
            $this->load->view('htmlhead');
        	$this->load->view('teacher/index_header');
            $this->load->view('teacher/index');
            $this->load->view('footer');
        }
        else if ($role=="A")
        {
            $this->load->view('htmlhead');
        	$this->load->view('assistant/index_header');
        	$this->load->view('assistant/index');
            $this->load->view('footer');
        }
        else if ($role=="V") //保证用户是经过了登陆的
        {
            $this->load->view('htmlhead');
        	$this->load->view('visitor/index_header');
        	$this->load->view('visitor/index');	
            $this->load->view('footer');
        }
    }

    public function news($nid)
    {
        if ($this->input->post())
        {
            $this->notice_model->update($nid);
        }

        $notice = $this->notice_model->get_notice($nid);
        
        $role = $this->session->userdata('role');

        if ($role=="S")
        {
            $this->load->view('htmlhead');
            $this->load->view('student/index_header');
            $this->load->view('student/news',$notice);
            $this->load->view('footer');
        }
        else if ($role=="T")
        {
            $this->load->view('htmlhead');
            $this->load->view('teacher/index_header');
            $this->load->view('teacher/news',$notice);
            $this->load->view('footer');
        }
        else if ($role=="A")
        {
            $this->load->view('htmlhead');
            $this->load->view('assistant/index_header');
            $this->load->view('assistant/news',$notice);
            $this->load->view('footer');
        }
        else if ($role=="V") //保证用户是经过了登陆的
        {
            $this->load->view('htmlhead');
            $this->load->view('visitor/index_header');
            $this->load->view('visitor/news',$notice); 
            $this->load->view('footer');
        }
    }

}
