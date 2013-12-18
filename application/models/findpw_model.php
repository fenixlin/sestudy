<?php
class Findpw_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    //判断数据库中是否有post过来的用户名
    public function validid($userid)
    {
        $data = array
        (
            'userid' => $userid
        );
        
        $query = $this->db->get_where('users',array('userid' => $data['userid']));
        if ($query->num_rows()==1) return TRUE;
        else return FALSE;
    }

    //判断数据库中该用户是否有密码找回问题
    public function getques($userid)
    {
        $data = array
        (
            'userid' => $userid
        );
        
        $query = $this->db->get_where('users',array('userid' => $data['userid']));
        if ($query->num_rows()==1)
        {
            $row = $query->row();
            return $row->ques;
        }
        else return "";
    }
}


