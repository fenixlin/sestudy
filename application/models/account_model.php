<?php
class Account_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
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


