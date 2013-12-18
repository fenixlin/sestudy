<?php

class Main extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('notice_model');
        $this->load->helper('url');
        $this->load->library('pagination');
        //下面一行输出调试信息
        //$this->output->enable_profiler(TRUE);
    }

    public function index()
    {
        if ($this->input->post())
        {
            $this->notice_model->update();
        }

        $data['results'] = $this->notice_model->home_data(10, 0);
        
    	$role = $this->session->userdata('role');

        if ($role=="S")
        {
            $this->load->view('htmlhead');
        	$this->load->view('student/index_header');
            $this->load->view('main/index', $data);
            $this->load->view('footer');
        }
        else if ($role=="T")
        {
            $this->load->view('htmlhead');
        	$this->load->view('teacher/index_header');
            $this->load->view('main/index', $data);
            $this->load->view('footer');
        }
        else if ($role=="A")
        {
            $this->load->view('htmlhead');
        	$this->load->view('assistant/index_header');
        	$this->load->view('main/index', $data);
            $this->load->view('footer');
        }
        else if ($role=="V") //保证用户是经过了登陆的
        {
            $this->load->view('htmlhead');
        	$this->load->view('visitor/index_header');
        	$this->load->view('main/index', $data);	
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
            $this->load->view('main/news',$notice);
            $this->load->view('footer');
        }
        else if ($role=="T")
        {
            $this->load->view('htmlhead');
            $this->load->view('teacher/index_header');
            $this->load->view('main/news',$notice);
            $this->load->view('footer');
        }
        else if ($role=="A")
        {
            $this->load->view('htmlhead');
            $this->load->view('assistant/index_header');
            $this->load->view('main/news',$notice);
            $this->load->view('footer');
        }
        else if ($role=="V") //保证用户是经过了登陆的
        {
            $this->load->view('htmlhead');
            $this->load->view('visitor/index_header');
            $this->load->view('main/news',$notice); 
            $this->load->view('footer');
        }
    }

    public function allnews()
    {
        $total = $this->notice_model->home_data_sum();

        $config['base_url'] = site_url().'main/allnews';
        $config['total_rows'] = $total;
        $config['per_page'] = 3;
        $config['num_links'] = 2;

        $config['full_tag_open'] = '<div class="pagination pagination-centered"><ul>';
        $config['full_tag_close'] = '</ul></div><!--pagination-->';
        $config['first_link'] = '&laquo;';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';        
        $config['last_link'] = '&raquo;';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';         
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';        
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';         
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';        
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';


        
        $this->pagination->initialize($config);
        $data['results'] = $this->notice_model->home_data($config['per_page'], $this->uri->segment(3));



        $role = $this->session->userdata('role');
        if ($role=="S")
        {
            $this->load->view('htmlhead');
            $this->load->view('student/index_header');
            $this->load->view('main/allnews', $data);
            $this->load->view('footer');
        }
        else if ($role=="T")
        {
            $this->load->view('htmlhead');
            $this->load->view('teacher/index_header');
            $this->load->view('main/allnews', $data);
            $this->load->view('footer');
        }
        else if ($role=="A")
        {
            $this->load->view('htmlhead');
            $this->load->view('assistant/index_header');
            $this->load->view('main/allnews', $data);
            $this->load->view('footer');
        }
        else if ($role=="V") //保证用户是经过了登陆的
        {
            $this->load->view('htmlhead');
            $this->load->view('visitor/index_header');
            $this->load->view('main/allnews',$data); 
            $this->load->view('footer');
        }
    }

    public function search()
    {
        if ($this->input->post())
        {
            $search = $this->input->post('search');
            $this->session->set_userdata('search',$search);
        }
        else
        {
            $search = $this->session->userdata('search');
        }

        $total = $this->notice_model->home_search_sum($search);

        $config['base_url'] = site_url().'main/search';
        $config['total_rows'] = $total;
        $config['per_page'] = 3;
        $config['num_links'] = 2;

        $config['full_tag_open'] = '<div class="pagination pagination-centered"><ul>';
        $config['full_tag_close'] = '</ul></div><!--pagination-->';
        $config['first_link'] = '&laquo;';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';        
        $config['last_link'] = '&raquo;';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';         
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';        
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';         
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';        
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        //$config['enable_query_strings'] = TRUE;
        //$config['page_query_string'] = TRUE;
        
        $this->pagination->initialize($config);
        $data['results'] = $this->notice_model->home_search($search, $config['per_page'], $this->uri->segment(3));

        $role = $this->session->userdata('role');
        if ($role=="S")
        {
            $this->load->view('htmlhead');
            $this->load->view('student/index_header');
            $this->load->view('main/search', $data);
            $this->load->view('footer');
        }
        else if ($role=="T")
        {
            $this->load->view('htmlhead');
            $this->load->view('teacher/index_header');
            $this->load->view('main/search', $data);
            $this->load->view('footer');
        }
        else if ($role=="A")
        {
            $this->load->view('htmlhead');
            $this->load->view('assistant/index_header');
            $this->load->view('main/search', $data);
            $this->load->view('footer');
        }
        else if ($role=="V") //保证用户是经过了登陆的
        {
            $this->load->view('htmlhead');
            $this->load->view('visitor/index_header');
            $this->load->view('main/search',$data); 
            $this->load->view('footer');
        }
    }

}
