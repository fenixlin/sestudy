<?php

class Findpw extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('findpw_model');
        //下面一行输出调试信息
        //$this->output->enable_profiler(TRUE);
    }

    public function index()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('userid', 'UserID', 'required');
        $data = array('message' => "", 'userid' => $this->input->post('userid'), 'ques' => "");
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('findpw', $data);
        }
        else if ($this->input->post('formid') == "1")
        {            
            if (!$this->findpw_model->validid($this->input->post('userid')))
            {
                $data['message']="Invalid userid.";
                $this->load->view('findpw', $data);
            }
            else
            {
                $ques = $this->findpw_model->getques($this->input->post('userid'));
                if ($ques=="")
                {
                    $data['message']="账户没有密码找回问题，请联系管理员";
                    $this->load->view('findpw', $data);                
                }
                else
                {
                    $data['ques']=$ques;
                    $this->load->view('findpw2', $data);
                }
            }
        }
        else if ($this->input->post('formid') == "2")
        {
            if ($this->findpw_model->validans($this->input->post('userid'), $this->input->post('ans')))
            {
            	$this->session->set_flashdata('successmsg', "<p>密码重置成功</p>");
            	$this->findpw_model->resetpw($this->input->post('userid'));
            	redirect("/login","refresh");	
            }
            else
            {
            	$data['message']="密码找回问题错误";
            	$ques = $this->findpw_model->getques($this->input->post('userid'));
            	$data['ques']=$ques;
            	$this->load->view('findpw2', $data);
            }
        }
    }
}

