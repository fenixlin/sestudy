<?php

class Link_model extends CI_Model 
{
	public function __construct()
	{
	    parent::__construct();
        $this->load->database();
	}
	
	public function link_insert($arr)
	{
		$this ->db->insert('link',$arr);
	}
	
	public function delete($linkid)
	{
		$sql = "DELETE FROM link WHERE linkid = '";
		$this->db->query($sql.$linkid."'");
	}
	
	public function show()
	{
		$this->db->select('*');
		$this->db->from('link');
		$this->db->where(array());
		$query = $this->db->get();
		
		return $query->result();
	}
	
	
}

?>