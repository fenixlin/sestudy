<?php
class Assignment_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    //返回查询结果
    public function get_data($classid, $courseid)
    {
        $query = $this->db->get_where('assignment', array('classid' => $classid, 'courseid' => $courseid));
        return $query;
    }

    public function get_homework($classid, $courseid, $number)
    {
        $query = $this->db->get_where('assignment', array('classid' => $classid, 'courseid' => $courseid, 'number' => $number));
        return $query;
    }

    public function insert()
    {
        $deadline = mktime(0,0,0,date("m"),date("d")+14,date("Y"));
        $date = date("Y-m-d", $deadline);
        $data = array
        (
            'classid' => $this->session->userdata('clsid'),
            'courseid' => $this->session->userdata('course'),
            'title' => $this->input->post('title'),
            'requirement' => $this->input->post('requirement'),            
            'date' => $date       
            );

        $this->db->insert('assignment', $data); 
    }

    public function update()
    {
        $data = array
        (
            'number' => $this->session->userdata('number'),
            'classid' => $this->session->userdata('clsid'),
            'courseid' => $this->session->userdata('course'),
            'title' => $this->input->post('title'),
            'requirement' => $this->input->post('requirement'),            
            );
        $this->db->where('number', $this->session->userdata('number'));
        $this->db->where('courseid', $this->session->userdata('course'));
        $this->db->where('classid', $this->session->userdata('clsid'));
        $this->db->update('assignment', $data); 
    }

    public function delete()
    {
        $this->db->where('number', $this->session->userdata('number'));
        $this->db->where('courseid', $this->session->userdata('course'));
        $this->db->where('classid', $this->session->userdata('clsid'));
        $this->db->delete('assignment'); 
    }
    
    public function get_teacher_class_list($userid, $courseid)
    {
        $this->db->select('*');
        $this->db->from('tch_belong');
        $this->db->where(array('userid' => $userid, 'tch_belong.courseid' =>$courseid));
        $this->db->join('classes','classes.classid = tch_belong.classid');
        $query = $this->db->get();
        return $query;
    }

    public function get_assistant_class_list($userid, $courseid)
    {
        $this->db->select('*');
        $this->db->from('ta_belong');
        $this->db->where(array('userid' => $userid, 'ta_belong.courseid' =>$courseid));
        $this->db->join('classes','classes.classid = ta_belong.classid');
        $query = $this->db->get();
        return $query;
    }

    public function get_class_teacher($courseid, $classid)
    {        
        $query = $this->db->get_where('tch_belong',array('courseid' => $courseid, 'classid' => $classid));
        return $query;
    }
}