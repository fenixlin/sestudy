<?php
class Grade_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_data()
    {
        $query = $this->db->get('grade');
        return $query;
    }

    public function get_data_title()
    {
    	$title = $this->session->userdata('title');
    	$query = $this->db->get_where('grade', array('title' => $title));
    	return $query;
    }

    public function insert()
    {
        $date = date("Y-m-d");
        $data = array('date' => $date,
                      'name' => $this->input->post('name') );
        $this->db->insert('grade', $data);
    }

    public function update()
    {
		$data = array
        (
            'grade' => $this->input->post('grade')            
        );
        $this->db->where('title', $this->session->userdata('title'));
        $this->db->update('grade', $data); 
    }
}