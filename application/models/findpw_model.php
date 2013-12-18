<?php
class Findpw_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    //判断数据库中是否有post过来的用户名
    public function validid($userid)
    {
        $cond = array
        (
            'userid' => $userid
        );
        
        $query = $this->db->get_where('users', $cond);
        if ($query->num_rows()==1) return TRUE;
        else return FALSE;
    }

    //判断数据库中该用户是否有密码找回问题
    public function getques($userid)
    {
        $cond = array
        (
            'userid' => $userid
        );
        
        $query = $this->db->get_where('users', $cond);
        if ($query->num_rows()==1)
        {
            $row = $query->row();
            return $row->ques;
        }
        else return "";
    }

    public function validans($userid, $ans)
    {
        $cond = array
        (
            'userid' => $userid,
            'answer' => $ans
        );
        
        $query = $this->db->get_where('users', $cond);
        if ($query->num_rows()==1) return TRUE;
        else return FALSE;
    }

    public function resetpw($userid)
    {
        $data = array
        (
            'password' => $userid
        );
        $this->db->update('users', $data, array('userid' => $userid));
    }
}


