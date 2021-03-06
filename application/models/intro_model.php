<?php
class Intro_model extends CI_Model {

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
        
        $query = $this->db->get_where('intro',array('course' => $data['course']));
        return $query->first_row();
    }

    //更新数据库
    public function update()
    {
        $course = $this->session->userdata('course');
        $data = array
        (
            'c_name' => $this->input->post('c_name'),
            'e_name' => $this->input->post('e_name'),            
            'course_code' => $this->input->post('course_code'),            
            'academy' => $this->input->post('academy'),
            'credit_hour' => $this->input->post('credit_hour'),
            'week_hour' => $this->input->post('week_hour'),
            'season' => $this->input->post('season'),
            'belong' => $this->input->post('belong'),
            'requirement' => $this->input->post('requirement'),
            'textbook' => $this->input->post('textbook'),
            'c_intro' => $this->input->post('c_intro'),
            'e_intro' => $this->input->post('e_intro')
        );
        $this->db->update('intro',$data,array('course' => $course));        
    }
}


