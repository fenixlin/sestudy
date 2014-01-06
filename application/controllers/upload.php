<?php

class Upload extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
		$this->load->model('recourse_model');
		$this->load->model('account_model');
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
		else if ($role == "S")
		{
			$this->load->view('htmlhead');
            $this->load->view('student/course_header');
            $this->load->view('student/upload');
            $this->load->view('footer');
		}
		
	}
	
	public function up()
	{
		//echo $this->input->post('information');
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
				$classid = $this->input->post('classid');
				$up_time = time();
				$time=date("Y-n-d");
				$userid = $this->session->userdata('userid');
				$name = $this->session->userdata('name');
				$information = $this->input->post('information');
				$filename2 = urlencode($filename);
				
				$courseid = $this->session->userdata('course');
				//$filename1 =iconv("UTF-8","GBK",$filename); //编码转换函数，防止乱码
				move_uploaded_file($file['tmp_name'],"./upload/recourse/{$up_time}{$filename2}");
				
				$arr = array('userid'=>$userid,'name' =>$name,'filename_see'=>$filename,'filename'=>$up_time.$filename2,
							 'uploaddate'=>$time,'information'=>$information,'classid'=>$classid,'courseid'=>$courseid);
				$this -> recourse_model->recourse_insert($arr);
				echo "<script>alert('上传成功')</script>";
	            echo "<script>location.href='/sestudy/index.php/upload';</script>";
			}
		}
		else
		{	
			//错误
			echo "wrong";
		}
	}
	
	public function delete_up($filename)
	{
		$this->recourse_model->delete_file($filename);
		chmod(dirname(dirname(dirname(__FILE__)))."/upload/recourse", 0777);  //更改权限
		unlink(dirname(dirname(dirname(__FILE__)))."/upload/recourse/".$filename);
		echo "<script>alert('删除成功')</script>";
	    echo "<script>location.href='/sestudy/index.php/upload';</script>";
	}
	
	public function reup($filename)
	{
		$this->recourse_model->delete_file($filename);
		chmod(dirname(dirname(dirname(__FILE__)))."/upload/recourse", 0777);  //更改权限
		unlink(dirname(dirname(dirname(__FILE__)))."/upload/recourse/".$filename);
		$this -> up();
	}
	
	public function download($file_name)
	{
		header("Content-type:text/html;charset=utf-8"); 
		//echo $file_name;
		//用以解决中文不能显示出来的问题 
		//$file_name=iconv("gb2312","utf-8",$file_name); 
		$file_sub_path=dirname(dirname(dirname(__FILE__)))."/upload/recourse/"; 
		$file_path=$file_sub_path.$file_name; 
		//首先要判断给定的文件存在与否 
		if(!file_exists($file_path)){ 
			//echo dirname(dirname(dirname(__FILE__)));
			echo "文件不存在!";
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
	
	
	
}

?>