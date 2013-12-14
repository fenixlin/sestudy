<?php

class Upload extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
		$this->load->model('recourse_model');
	}
	
	public function index()
	{
	    $this->load->library('upload');
	    $role = $this->session->userdata('role');
		if ($role == "T")
		{
		    $this->load->view('htmlhead');
            $this->load->view('teacher/course_header');
            $this->load->view('teacher/upload');
            $this->load->view('footer');
		}
		else if ($role == "A")
		{
		    $this->load->view('htmlhead');
            $this->load->view('assistant/course_header');
            $this->load->view('assistant/upload');
            $this->load->view('footer');
		}
	}
	
	public function up()
	{
	    if(!empty($_POST['sub']))
		{
			$file = $_FILES['upfile'];
			//var_dump($_FILES['upfile']);
			//判断文件大小
			if($file['size'] >= 20000000)  //20M
			{
				echo "<script>alert('文件过大')</script>";
	            echo "<script>location.href='/sestudy/index.php/upload';</script>";
			}
			else if ($file['tmp_name'] == "")
			{
				echo "<script>alert('请选择文件')</script>";
	            echo "<script>location.href='/sestudy/index.php/upload';</script>";
			}
			else
			{
			    $type = $file['type'];
				$filename = $file['name'];
				$up_time = time();
				$time=date("Y-n-d");
				$userid = $this->session->userdata('userid');
				$filename1 =iconv("UTF-8","GBK",$filename); //编码转换函数，防止乱码
				move_uploaded_file($file['tmp_name'],"./upload/{$up_time}{$filename1}");
				
				$arr = array('userid'=>$userid,'filename_see'=>$filename,'filename'=>$up_time.$filename,'uploaddate'=>$time);
				$this -> recourse_model->recourse_insert($arr);
				echo "<script>alert('文件上传成功')</script>";
	            echo "<script>location.href='/sestudy/index.php/upload';</script>";
			}
		}
		else
		{	
			//错误
			echo "wrong";
		}
	}
}


?>