<?php

class Notice extends CI_Controller {

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
            $this->load->view('student/course_header');
            $this->load->view('student/notice/index');
            $this->load->view('footer');
        }
        else if ($role=="T")
        {
            $this->load->view('htmlhead');
            $this->load->view('teacher/course_header');
            $this->load->view('teacher/notice/index');
            $this->load->view('footer');
        }
        else if ($role=="A")
        {
            $this->load->view('htmlhead');
            $this->load->view('assistant/course_header');
            $this->load->view('assistant/notice/index');
            $this->load->view('footer');
        }
    }

    public function view($nid)
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
            $this->load->view('student/course_header');
            $this->load->view('student/notice/view',$notice);
            $this->load->view('footer');
        }
        else if ($role=="T")
        {
            $this->load->view('htmlhead');
            $this->load->view('teacher/course_header');
            $this->load->view('teacher/notice/view',$notice);
            $this->load->view('footer');
        }
        else if ($role=="A")
        {
            $this->load->view('htmlhead');
            $this->load->view('assistant/course_header');
            $this->load->view('assistant/notice/view',$notice);
            $this->load->view('footer');
        }
        
    }

    public function edit($nid)
    {
        $notice = $this->notice_model->get_notice($nid);

        $role = $this->session->userdata('role');
        if ($role=="T")
        {
            $this->load->view('htmlhead');
            $this->load->view('teacher/course_header');
            $this->load->view('teacher/notice/edit',$notice);
            $this->load->view('footer');
        }
        else if ($role=="A")
        {
            $this->load->view('htmlhead');
            $this->load->view('assistant/course_header');
            $this->load->view('assistant/notice/edit',$notice);
            $this->load->view('footer');
        }
        
    }

    public function create()
    {
        $role = $this->session->userdata('role');

        if ($role=="T")
        {
            $this->load->view('htmlhead');
            $this->load->view('teacher/course_header');
            $this->load->view('teacher/notice/create');
            $this->load->view('footer');
        }
        else if ($role=="A")
        {
            $this->load->view('htmlhead');
            $this->load->view('assistant/course_header');
            $this->load->view('assistant/notice/create');
            $this->load->view('footer');
        }
    }

    public function delete($nid)
    {
        $notice = $this->notice_model->get_notice($nid);

        $role = $this->session->userdata('role');
        if ($role=="T")
        {
            $this->load->view('htmlhead');
            $this->load->view('teacher/course_header');
            $this->load->view('teacher/notice/delete',$notice);
            $this->load->view('footer');
        }
        else if ($role=="A")
        {
            $this->load->view('htmlhead');
            $this->load->view('assistant/course_header');
            $this->load->view('assistant/notice/delete',$notice);
            $this->load->view('footer');
        }
    }
}

