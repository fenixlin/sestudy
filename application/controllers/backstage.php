<?php

class Backstage extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('backstage_model');
        //下面一行输出调试信息
        //$this->output->enable_profiler(TRUE);
    }

    public function index()
    {
        $this->load->view('backstage/htmlhead');
        $this->load->view('backstage/mainpage');
    }

    public function teachers()
    {
        $this->load->view('backstage/htmlhead');
        $this->load->view('backstage/teachers');
    }

    public function teachers_new()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'UserID', 'required');

        if ($this->form_validation->run() == FALSE)
        {            
            $this->load->view('backstage/htmlhead');
            $this->load->view('backstage/teachers_new');
        }
        else
        {
            if ($this->backstage_model->existing_id())
            {
                $this->session->set_flashdata('message', "<p>用户名已被注册</p>");               
                redirect("/backstage/teachers_new");
            }
            else
            { 
                $this->backstage_model->insert_teacher();
                redirect("/backstage/teachers");
            }
        }        
    }

    public function teachers_edit($userid)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'UserID', 'required');

        $data = array('userid' => $userid);
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('backstage/htmlhead');
            $this->load->view('backstage/teachers_edit', $data);
        }
        else
        {
            $this->backstage_model->update_teacher($userid);
            redirect("/backstage/teachers");
        }        
    }

    public function teachers_delete($userid)
    {
        $this->backstage_model->delete_teacher($userid);
        redirect("/backstage/teachers");
    }

    public function assistants()
    {
        $this->load->view('backstage/htmlhead');
        $this->load->view('backstage/assistants');
    }

    public function students()
    {
        $this->load->view('backstage/htmlhead');
        $this->load->view('backstage/students');
    }

    public function courses()
    {
        $this->load->view('backstage/htmlhead');
        $this->load->view('backstage/courses');
    }
}

