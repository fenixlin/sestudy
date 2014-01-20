<?php

class Assignment extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('assignment_model');
        //下面一行输出调试信息
       	//$this->output->enable_profiler(TRUE);
    }

    public function index()
    {
        $role = $this->session->userdata('role');
        if ($role=="S")
        {
            $this->load->model('grade_model');
            $this->load->view('htmlhead');
            $this->load->view('student/course_header');
            $this->load->view('student/assignment');
            $this->load->view('footer');
        }
        else if ($role=="T")
        {
            $this->load->view('htmlhead');
            $this->load->view('teacher/course_header');
            $this->load->view('teacher/assignment/index');
            $this->load->view('footer');
        }
        else if ($role=="A")
        {
            $this->load->view('htmlhead');
            $this->load->view('assistant/course_header');
            $this->load->view('assistant/assignment/index');
            $this->load->view('footer');
        }
    }

    public function operate($classid)
    {
        $role = $this->session->userdata('role');
        $this->session->set_userdata('clsid', $classid);
        if ($role=="T")
        {
            $this->load->view('htmlhead');
            $this->load->view('teacher/course_header');
            $this->load->view('teacher/assignment/homeworklist');
            $this->load->view('footer');
        }
        if ($role=="A")
        {
            $this->load->view('htmlhead');
            $this->load->view('assistant/course_header');
            $this->load->view('assistant/assignment/homeworklist');
            $this->load->view('footer');
        }
    }

    public function assignhomework($classid)
    {
        $role = $this->session->userdata('role');
        $this->session->set_userdata('clsid', $classid);
        if ($role=="T")
        {
            $this->load->view('htmlhead');
            $this->load->view('teacher/course_header');
            $this->load->view('teacher/assignment/assignhomework');
            $this->load->view('footer');
        }
        if ($role=="A")
        {
            $this->load->view('htmlhead');
            $this->load->view('assistant/course_header');
            $this->load->view('assistant/assignment/assignhomework');
            $this->load->view('footer');
        }
    }

    public function edit($number)
    {
        $role = $this->session->userdata('role');
        $this->session->set_userdata('number', $number);
        if ($role=="T")
        {
            $this->load->view('htmlhead');
            $this->load->view('teacher/course_header');
            $this->load->view('teacher/assignment/edit');
            $this->load->view('footer');
        }
        if ($role=="A")
        {
            $this->load->view('htmlhead');
            $this->load->view('assistant/course_header');
            $this->load->view('assistant/assignment/edit');
            $this->load->view('footer');
        }
    }

    public function delete($number)
    {
        $role = $this->session->userdata('role');
        $this->session->set_userdata('number', $number);
        $this->assignment_model->delete();
        if ($role=="T")
        {
            $this->load->view('htmlhead');
            $this->load->view('teacher/course_header');
            $this->load->view('teacher/assignment/homeworklist');
            $this->load->view('footer');
        }
        if ($role=="A")
        {
            $this->load->view('htmlhead');
            $this->load->view('assistant/course_header');
            $this->load->view('assistant/assignment/homeworklist');
            $this->load->view('footer');
        }
    }

    public function view()
    {
        $role = $this->session->userdata('role');
        $this->load->model('grade_model');
        if ($role=="T")
        {
            $this->load->view('htmlhead');
            $this->load->view('teacher/course_header');
            $this->load->view('teacher/assignment/view');
            $this->load->view('footer');
        }
        if ($role=="A")
        {
            $this->load->view('htmlhead');
            $this->load->view('assistant/course_header');
            $this->load->view('assistant/assignment/view');
            $this->load->view('footer');
        }
    }

    public function grade($title)
    {
        $role = $this->session->userdata('role');
        $this->load->model('grade_model');
        $this->session->set_userdata('title', $title);
        if ($role=="T")
        {
            $this->load->view('htmlhead');
            $this->load->view('teacher/course_header');
            $this->load->view('teacher/assignment/grade');
            $this->load->view('footer');
        }
        if ($role=="A")
        {
            $this->load->view('htmlhead');
            $this->load->view('assistant/course_header');
            $this->load->view('assistant/assignment/grade');
            $this->load->view('footer');
        }
    }

    public function mark()
    {
        $role = $this->session->userdata('role');
        $this->load->model('grade_model');
        if ($this->input->post())
        {
            $this->grade_model->update();
        }
        if ($role=="T")
        {
            $this->load->view('htmlhead');
            $this->load->view('teacher/course_header');
            $this->load->view('teacher/assignment/view');
            $this->load->view('footer');
        }
        if ($role=="A")
        {
            $this->load->view('htmlhead');
            $this->load->view('assistant/course_header');
            $this->load->view('assistant/assignment/view');
            $this->load->view('footer');
        }
    }

    public function handin()
    {
        $role = $this->session->userdata('role');

        if ($role=="S")
        {
            $this->load->view('htmlhead');
            $this->load->view('student/course_header');
            $this->load->view('student/handin');
            $this->load->view('footer');
        }
        if ($role=="A")
        {
            $this->load->view('htmlhead');
            $this->load->view('assistant/course_header');
            $this->load->view('assistant/assignment/handin');
            $this->load->view('footer');
        }
    }

    public function uploadhomework()
    {
        $role = $this->session->userdata('role');
        $this->load->model('grade_model');
        if ($this->input->post())
        {
            $this->grade_model->insert();
        }
        if ($role=="S")
        {
            $this->load->view('htmlhead');
            $this->load->view('student/course_header');
            $this->load->view('student/assignment');
            $this->load->view('footer');
        }
    }

}