<?php

class Notice extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('notice_model');
        $this->load->helper('url');
        $this->load->library('pagination');
        //下面一行输出调试信息
        $this->output->enable_profiler(TRUE);
    }

    public function index()
    {   
        if ($this->input->post())
        {
            $this->notice_model->update();
        }

        $data['results'] = $this->notice_model->course_data(10, 0);

        $role = $this->session->userdata('role');
        if ($role=="S")
        {
            $this->load->view('htmlhead');
            $this->load->view('student/course_header');
            $this->load->view('student/notice/index', $data);
            $this->load->view('footer');
        }
        else if ($role=="T")
        {
            $this->load->view('htmlhead');
            $this->load->view('teacher/course_header');
            $this->load->view('teacher/notice/index', $data);
            $this->load->view('footer');
        }
        else if ($role=="A")
        {
            $this->load->view('htmlhead');
            $this->load->view('assistant/course_header');
            $this->load->view('assistant/notice/index', $data);
            $this->load->view('footer');
        }
    }

    public function view($nid)
    {
        if ($this->input->post())
        {
            if ($nid == $this->notice_model->set_nid())
            {
                $this->notice_model->insert();
            }
            else
            {
                $this->notice_model->update($nid);
            }
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

    public function allnotice()
    {
        $total = $this->notice_model->course_data_sum();

        $config['base_url'] = site_url().'notice/allnotice';
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
        $data['results'] = $this->notice_model->course_data($config['per_page'], $this->uri->segment(3));



        $role = $this->session->userdata('role');
        if ($role=="S")
        {
            $this->load->view('htmlhead');
            $this->load->view('student/course_header');
            $this->load->view('student/notice/allnotice', $data);
            $this->load->view('footer');
        }
        else if ($role=="T")
        {
            $this->load->view('htmlhead');
            $this->load->view('teacher/course_header');
            $this->load->view('teacher/notice/allnotice', $data);
            $this->load->view('footer');
        }
        else if ($role=="A")
        {
            $this->load->view('htmlhead');
            $this->load->view('assistant/course_header');
            $this->load->view('assistant/notice/allnotice', $data);
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

        $total = $this->notice_model->course_search_sum($search);

        $config['base_url'] = site_url().'notice/search';
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
        $data['results'] = $this->notice_model->course_search($search, $config['per_page'], $this->uri->segment(3));

        $role = $this->session->userdata('role');
        if ($role=="S")
        {
            $this->load->view('htmlhead');
            $this->load->view('student/course_header');
            $this->load->view('student/notice/search', $data);
            $this->load->view('footer');
        }
        else if ($role=="T")
        {
            $this->load->view('htmlhead');
            $this->load->view('teacher/course_header');
            $this->load->view('teacher/notice/search', $data);
            $this->load->view('footer');
        }
        else if ($role=="A")
        {
            $this->load->view('htmlhead');
            $this->load->view('assistant/course_header');
            $this->load->view('assistant/notice/search', $data);
            $this->load->view('footer');
        }
    }
}

