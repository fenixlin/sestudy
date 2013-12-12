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
}
?>