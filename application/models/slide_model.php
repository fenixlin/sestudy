<?php

class Slide_model extends CI_Model 
{
	 public function __construct()
	{
	    parent::__construct();
        $this->load->database();
	}
	
	public function slide_insert($arr)
	{
		$this ->db->insert('slide',$arr);
	}
	
	public function seetch_course_upload($userid, $courseid)
	{
		$this->db->select('slide.name, uploaddate, filename, filename_see, information, slide.classid');
        $this->db->from('slide');
        $this->db->where(array('slide.courseid' => $courseid, 'tch_belong.userid' =>$userid));
        $this->db->join('tch_belong','tch_belong.classid = slide.classid');
		$this->db->distinct('filename');
        $query = $this->db->get();
	
		return $query->result();
	}
	
	public function seeta_course_upload($userid, $courseid)
	{
		$this->db->select('slide.name, uploaddate, filename, filename_see, information, slide.classid');
        $this->db->from('slide');
        $this->db->where(array('slide.courseid' => $courseid, 'ta_belong.userid' =>$userid));
        $this->db->join('ta_belong','ta_belong.classid = slide.classid');
		$this->db->distinct('filename');
        $query = $this->db->get();
	
		return $query->result();
	}
	
	public function see_class_upload($classid)  //班级ID查询课程
	{
		$this->db->select('*');
		$this->db->from('slide');
		$this->db->where(array('classid' => $classid));
		$query = $this->db->get();
		
		return $query->result();
	}
	
	public function see_stu_class($courseid)
	{
		$this->db->select('*');
		$this->db->from('stu_belong');
		$this->db->where(array('courseid' => $courseid));
		$query = $this->db->get();
		
		return $query->result();
	}
	
	
	public function delete_file($filename)
	{
		$sql = "DELETE FROM slide WHERE filename = '";
		$this->db->query($sql.$filename."'");
	}
	
	public function get_time($classid)
	{
		$this->db->select('*');
		$this->db->from('classes');
		$this->db->where(array('classid' =>$classid));
		
		$query = $this->db->get();
		return $query->result();
	}
	
	public function douwncount_plus($filename)
	{
		$this->db->where('filename', $filename);
		$this->db->select('*');
		$query = $this->db->get('slide');
		$data = $query->result();

		$arr = array('userid'=>$data[0]->userid,'filename_see'=>$data[0]->filename_see,'filename'=>$data[0]->filename,
					'uploaddate'=>$data[0]->uploaddate,'downcount'=>($data[0]->downcount+1),'information'=>$data[0]->information);
		$this ->db->where('filename',$filename);
		$this ->db->update('slide',$arr);
		
	}
	

}
?>