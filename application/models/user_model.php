<?php
class User_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    //返回查询结果
    public function get_all_teacher()
    {
        $this->db->where('role', 'T');
        $query = $this->db->get('users');
        return $query;
    }
}


