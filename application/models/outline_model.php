<?php
class Outline_model extends CI_Model {

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
        
        $query = $this->db->get_where('outline',array('course' => $data['course']));
        return $query->first_row();
    }

    //更新数据库
    public function update()
    {
        $course = $this->session->userdata('course');
        $data = array
        (
            'target' => $this->input->post('target'),
            'requirement' => $this->input->post('requirement'),
            'arrangement' => $this->input->post('arrangement'),
            'recommendation' => $this->input->post('recommendation')
        );
        
        $this->db->update('outline',$data);        
    }
}


