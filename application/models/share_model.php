<?php

class Share_model extends CI_Model 
{
	public function __construct()
	{
	    parent::__construct();
        $this->load->database();
	}
	
	public function share_insert($arr)
	{
		$this ->db->insert('share',$arr);
	}
	
	public function show_my_share($userid, $courseid)
	{
		$this->db->select('*');
		$this->db->from('share');
		$this->db->where(array('userid' => $userid, 'courseid' => $courseid));
		$query = $this->db->get();
		
		return $query->result();
	}
	
	public function show_course_share($courseid)
	{
		$this->db->select('*');
		$this->db->from('share');
		$this->db->where(array('courseid' => $courseid));
		$query = $this->db->get();
		
		return $query->result();
	}
	
	
	public function delete_file($filename)
	{
		$sql = "DELETE FROM share WHERE filename = '";
		$this->db->query($sql.$filename."'");
	}
	
	public function douwncount_plus($filename)
	{
		$this->db->where('filename', $filename);
		$this->db->select('*');
		$query = $this->db->get('share');
		$data = $query->result();

		$arr = array('userid'=>$data[0]->userid,'filename_see'=>$data[0]->filename_see,'filename'=>$data[0]->filename,
					'uploaddate'=>$data[0]->uploaddate,'downcount'=>($data[0]->downcount+1),'information'=>$data[0]->information);
		$this ->db->where('filename',$filename);
		$this ->db->update('share',$arr);
		
	}
	
	public function pub_downtable()
	{
		$this->db->select('*');
		$this->db->from('share');
		$this->db->where(array('courseid' => -1));
		$query = $this->db->get();
		
		return $query->result();
	
	}
	
	
	

}


?>