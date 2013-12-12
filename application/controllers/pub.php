<?php

class Pub extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
		$this->load->model('recourse_model');
	}
	
	public function index()
    {
        $this->load->library('upload');
	    $role = $this->session->userdata('role');
		if ($role == "S")
		{
			$this->load->view('htmlhead');
            $this->load->view('student/course_header');
            $this->load->view('student/pub');
            $this->load->view('footer');
		}
		else if ($role == "T")
		{
		    $this->load->view('htmlhead');
            $this->load->view('teacher/course_header');
            $this->load->view('teacher/pub');
            $this->load->view('footer');
		}
		else if ($role == "A")
		{
		    $this->load->view('htmlhead');
            $this->load->view('assistant/course_header');
            $this->load->view('assistant/pub');
            $this->load->view('footer');
		}
		else if ($role == "V")
		{
		    $this->load->view('htmlhead');
            $this->load->view('visitor/course_header');
            $this->load->view('visitor/pub');
            $this->load->view('footer');
		}
    }
	
	public function abc()
	{
		$ttt = $this->recourse_model->pub_downtable();
		var_dump($ttt);
	}
}
?>