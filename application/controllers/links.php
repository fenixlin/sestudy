<?php
class Links extends CI_Controller 
{
	public function __construct()
	{
	    parent::__construct();
		$this->load->model('link_model');
	}
	
	public function index()
	{
	    $role = $this->session->userdata('role');
		if ($role == "T")
		{
			$this->load->view('htmlhead');
            $this->load->view('teacher/link_header');
            $this->load->view('teacher/link');
            $this->load->view('footer');
		}
		
		else if ($role == "S")
		{
			$this->load->view('htmlhead');
            $this->load->view('student/link_header');
            $this->load->view('student/link');
            $this->load->view('footer');
		}
		
		else if ($role == "A")
		{
			$this->load->view('htmlhead');
            $this->load->view('assistant/link_header');
            $this->load->view('assistant/link');
            $this->load->view('footer');
		}
		
		else if ($role == "V")
		{
			$this->load->view('htmlhead');
            $this->load->view('visitor/link_header');
            $this->load->view('visitor/link');
            $this->load->view('footer');
		}
	
	
	}
	
	public function add()
	{	
		$information = $this->input->post('information');
		$name = $this->input->post('name');
		$url = $this->input->post('url');
	
		$arr = array('name' =>$name, 'url'=>$url, 'information'=>$information);
		$this -> link_model->link_insert($arr);
				
		echo "<script>alert('添加成功')</script>";
	    echo "<script>location.href='/sestudy/index.php/links';</script>";
	}
	
	public function delete_link($linkid)
	{
		//echo $url;
		$this->link_model->delete($linkid);
		echo "<script>alert('删除成功')</script>";
	    echo "<script>location.href='/sestudy/index.php/links';</script>";
	}
	
	
}

?>