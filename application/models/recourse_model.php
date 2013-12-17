<?php

class Recourse_model extends CI_Model 
{
	 public function __construct()
	{
	    parent::__construct();
        $this->load->database();
	}
	
	public function recourse_insert($arr)
	{
		$this ->db->insert('recourse',$arr);
	}
	
	public function pub_downtable()
	{
		$sql = "SELECT * FROM recourse WHERE downcount>-1";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	public function douwncount_plus($filename)
	{
		$this->db->where('filename', $filename);
		$this->db->select('*');
		$query = $this->db->get('recourse');
		$data = $query->result();

		$arr = array('userid'=>$data[0]->userid,'filename_see'=>$data[0]->filename_see,'filename'=>$data[0]->filename,
					'uploaddate'=>$data[0]->uploaddate,'downcount'=>($data[0]->downcount+1),'information'=>$data[0]->information);
		$this ->db->where('filename',$filename);
		$this ->db->update('recourse',$arr);
		
	}
}
?>