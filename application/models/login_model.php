<?php
class Login_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    //判断数据库中是否有post过来的用户名和密码对
    public function validate()
    {
        $data = array
        (
            'userid' => $this->input->post('userid'),
            'password' => $this->input->post('password'),
            'role' => $this->input->post('role')
        );
        
        $query = $this->db->get_where('users',array('userid' => $data['userid'], 'password' => $data['password'], 'role' => $data['role']));
        if ($query->num_rows()>0) return TRUE;
        else return FALSE;
    }
}


