<?php
class Tinfo_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    //返回查询结果
    public function get_data()
    {
        $data = array
        (
            'course' => $this->session->userdata('course')
        );
        
        $query = $this->db->get_where('tinfo',array('course' => $data['course']));
        return $query->first_row();
    }

    //更新数据库
    public function update()
    {
        $course = $this->session->userdata('course');
        $data = array
        (
            'info' => $this->input->post('info'),
        );
        
        $this->db->update('tinfo',$data);        
    }
}


