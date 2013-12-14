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
	
	public function download($file_name)
	{
		header("Content-type:text/html;charset=utf-8"); 
		//$file_name="c.jpg"; 
		//用以解决中文不能显示出来的问题 
		$file_name=iconv("utf-8","gb2312",$file_name); 
		$file_sub_path=dirname(dirname(dirname(__FILE__)))."/upload/"; 
		$file_path=$file_sub_path.$file_name; 
		//首先要判断给定的文件存在与否 
		if(!file_exists($file_path)){ 
			//echo dirname(dirname(dirname(__FILE__)));
			echo $file_path; 
			return ; 
		} 
		$fp=fopen($file_path,"r"); 
		$file_size=filesize($file_path); 
		//下载文件需要用到的头 
		Header("Content-type: application/octet-stream"); 
		Header("Accept-Ranges: bytes"); 
		Header("Accept-Length:".$file_size); 
		Header("Content-Disposition: attachment; filename=".$file_name); 
		$buffer=1024; 
		$file_count=0; 
		//向浏览器返回数据 
		while(!feof($fp) && $file_count<$file_size)
		{ 
			$file_con=fread($fp,$buffer); 
			$file_count+=$buffer; 
			echo $file_con; 
		}
		$this -> recourse_model->douwncount_plus($file_name);
		fclose($fp); 
	}
	
	public function abc()
	{
		$ttt = $this->recourse_model->pub_downtable();
		var_dump($ttt);
	}
}
?>