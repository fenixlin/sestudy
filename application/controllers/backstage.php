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

    public function assistants_new()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'UserID', 'required');

        if ($this->form_validation->run() == FALSE)
        {            
            $this->load->view('backstage/htmlhead');
            $this->load->view('backstage/assistants_new');
        }
        else
        {
            if ($this->backstage_model->existing_id())
            {
                $this->session->set_flashdata('message', "<p>用户名已被注册</p>");               
                redirect("/backstage/assistants_new");
            }
            else
            { 
                $this->backstage_model->insert_assistant();
                redirect("/backstage/assistants");
            }
        }        
    }

    public function assistants_edit($userid)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'UserID', 'required');

        $data = array('userid' => $userid);
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('backstage/htmlhead');
            $this->load->view('backstage/assistants_edit', $data);
        }
        else
        {
            $this->backstage_model->update_assistant($userid);
            redirect("/backstage/assistants");
        }        
    }

    public function assistants_delete($userid)
    {
        $this->backstage_model->delete_assistant($userid);
        redirect("/backstage/assistants");
    }

    public function students()
    {
        $this->load->view('backstage/htmlhead');
        $this->load->view('backstage/students');
    }

    public function students_new()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'UserID', 'required');

        if ($this->form_validation->run() == FALSE)
        {            
            $this->load->view('backstage/htmlhead');
            $this->load->view('backstage/students_new');
        }
        else
        {
            if ($this->backstage_model->existing_id())
            {
                $this->session->set_flashdata('message', "<p>用户名已被注册</p>");               
                redirect("/backstage/students_new");
            }
            else if ($this->backstage_model->duplicate_courses())
            {
                $this->session->set_flashdata('message', "<p>学生只能选择每个课程的至多一个班级</p>");               
                redirect("/backstage/students_new");
            }
            else
            { 
                $this->backstage_model->insert_student();
                redirect("/backstage/students");
            }
        }        
    }

    public function students_edit($userid)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'UserID', 'required');

        $data = array('userid' => $userid);
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('backstage/htmlhead');
            $this->load->view('backstage/students_edit', $data);
        }
        else
        {
            if ($this->backstage_model->duplicate_courses())
            {
                $this->session->set_flashdata('message', "<p>学生只能选择每个课程的至多一个班级</p>");               
                redirect("/backstage/students_new");
            }
            else
            {
                $this->backstage_model->update_student($userid);
                redirect("/backstage/students");
            }
        }        
    }

    public function students_delete($userid)
    {
        $this->backstage_model->delete_student($userid);
        redirect("/backstage/students");
    }
    
    public function courses()
    {
        $this->load->view('backstage/htmlhead');
        $this->load->view('backstage/courses');
    }

    public function classes_new()
    {
        $this->load->library('form_validation');        
        $this->form_validation->set_rules('courseid[]', '所属课程', 'required');        
        $this->form_validation->set_message('required', '请填写 %s'); 

        if ($this->form_validation->run() == FALSE)
        {            
            $this->load->view('backstage/htmlhead');
            $this->load->view('backstage/classes_new');
        }
        else
        {
            $this->backstage_model->insert_class();            
            redirect("/backstage/courses");
        }
    }

    public function classes_edit($classid)
    {
        $this->load->library('form_validation');        
        $this->form_validation->set_rules('courseid[]', '所属课程', 'required');        
        $this->form_validation->set_message('required', '请填写 %s'); 

        $data = array('classid' => $classid);
        if ($this->form_validation->run() == FALSE)
        {            
            $this->load->view('backstage/htmlhead');
            $this->load->view('backstage/classes_edit', $data);
        }
        else
        {
            $this->backstage_model->edit_class($classid);  
            redirect("/backstage/courses");
        }
    }

    public function classes_delete($classid)
    {
        $this->backstage_model->delete_class($classid);
        redirect("/backstage/courses");
    }

    public function forums_new()
    {
        $this->load->library('form_validation');        
        $this->form_validation->set_rules('class[]', '对应班级', 'required');        
        $this->form_validation->set_message('required', '请填写 %s'); //not working here, may because of array usage

        if ($this->form_validation->run() == FALSE)
        {            
            $this->load->view('backstage/htmlhead');
            $this->load->view('backstage/forums_new');
        }
        else
        {
            $this->backstage_model->insert_forum();            
            redirect("/backstage/courses");
        }
    }

    public function forums_delete($forumid)
    {
        $this->backstage_model->delete_forum($forumid);
        redirect("/backstage/courses");
    }

}

