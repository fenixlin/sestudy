<?php

class Prof extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('prof_model');
        //下面一行输出调试信息
        $this->output->enable_profiler(TRUE);
    }

    public function index()
    {
        $this->load->library('form_validation');
        //$this->form_validation->set_rules('userid','UserID','required');
        $this->form_validation->set_rules('password_old','Password','required');
        //$this->form_validation->set_rules('password_c','Password comfirmation','required');

        $data = array
        ( 
            'message' => "",
            'success' => FALSE
        );

        //NEXT: put some form_validating setences
        if ($this->form_validation->run() == TRUE)
        {
            if ($this->prof_model->validate() == FALSE)
            {
                $data['message']="Invalid password.";
            }
            else if ($this->valid() == FALSE)
            {
                $data['message']="New passwords do not match.";                
            }
            else
            {
                $data['success']=TRUE;
                $data['message']="Profile successfully updated.";
            }            
        }
        
        $role = $this->session->userdata('role');

        if ($role=="S")
        {
            $this->load->view('htmlhead');
            $this->load->view('student/index_header');
            $this->load->view('prof',$data);
            $this->load->view('footer');
        }
        else if ($role=="T")
        {
            $this->load->view('htmlhead');
            $this->load->view('teacher/index_header');
            $this->load->view('prof',$data);
            $this->load->view('footer');
        }
        else if ($role=="A")
        {
            $this->load->view('htmlhead');
            $this->load->view('assistant/index_header');
            $this->load->view('prof',$data);
            $this->load->view('footer');
        }
    }

    private function valid()
    {
        if ($this->input->post('password_new') == $this->input->post('password_newc'))
        {
            $this->prof_model->update();
            return TRUE;
        }
        else return FALSE;
    }

}

