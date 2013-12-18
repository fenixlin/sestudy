<?php

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        //下面一行输出调试信息
        //$this->output->enable_profiler(TRUE);
    }

    public function index()
    {
        //载入要用的函数库
        //$this->load->helper('form');
        $this->load->library('form_validation');

        //这里调用验证函数对用户名和密码设置验证方法
        $this->form_validation->set_rules('userid', 'UserID', 'callback_validate');
        //$this->form_validation->set_rules('password', 'Password', 'required');

        //第一次运行的时候没有提交表单，或没有通过验证，显示login页面
        //(因为登出也是这个页面，所以不管有没有cookie都要登录..?)
        if ($this->form_validation->run() == FALSE)
        {
            if ($this->input->post('go')=="游客浏览")
            {
                $sessiondata = array
                (
                    //存储为游客身份
                    'userid' => "anonymous",
                    'role' => "V",
					'name' => "游客"
                );
                //存储session
                $this->session->set_userdata($sessiondata);
                //跳转到主页
                redirect('/main','refresh');
            }
            else $this->load->view('login');
        }
        else
        {
            if ($this->input->post('go')=="登陆")
            {
                //用户验证成功，提取需要的session信息
				$data = $this->login_model->getname($this->input->post('userid'));
				$name = $data[0]->name;
                $sessiondata = array
                (
                    'userid' => $this->input->post('userid'),
                    'role' => $this->input->post('role'),
					'name' => $name
                    //'userid' => $this->login_model->getid()
                );
            }
            else
            {
                //存储为游客身份
                $sessiondata = array
                (
                    'userid' => "anonymous",
                    'role' => "V",
					'name' => "游客"
                    //'userid' => $this->login_model->getid()
                );
            }
            //存储session
            $this->session->set_userdata($sessiondata);
            //跳转到主页
            redirect('/main','refresh');
        }
    }

    //用户名验证函数，调用model的函数来验证用户名、密码和角色的匹配情况
    public function validate($str)
    {
        //如果是用户登陆再检查身份
        if ($this->input->post('go')=="登陆")
        {
            if ($this->login_model->validate() == FALSE)
            {
                $this->form_validation->set_message('validate', 'Invalid UserID or Password.');
                return FALSE;
            }
            else
            {
                return TRUE;
            }
        }
        else if ($this->input->post('go')=="游客浏览")
        {
            return TRUE;
        }
        else return FALSE;
    }
}
