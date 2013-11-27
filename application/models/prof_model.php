<?php
class Prof_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    //返回查询结果
    public function getProfile()
    {
        $data = array
        (
            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role')
        );
        
        $query = $this->db->get_where('users',array('userid' => $data['userid'], 'role' => $data['role']));
        return $query->first_row();
    }

    //验证用户提交的数据是否正确
    public function validate()
    {
        $data = array
        (
            'userid' => $this->session->userdata('userid'),
            'password' => $this->input->post('password_old'),
            'role' => $this->session->userdata('role')
        );
        
        $query = $this->db->get_where('users',array('userid' => $data['userid'], 'password' => $data['password'], 'role' => $data['role']));
        if ($query->num_rows()>0) return TRUE;
        else return FALSE;
    }

    //更新数据库
    public function update()
    {
        $userid = $this->session->userdata('userid');
        $data = array
        (
            'email' => $this->input->post('email'),
            'ques' => $this->input->post('question'),            
            'answer' => $this->input->post('answer'),            
            'major' => $this->input->post('major'),
            'tel' => $this->input->post('tel')
        );
        $this->db->update('users',$data,array('userid' => $userid));

        $newPassword = $this->input->post('password_new');
        if ($newPassword != "")
        {
            $this->db->update('users',array('password' => $newPassword),array('userid' => $userid));
        }
    }
}


