<?php
class Backstage_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_teacher_list()
    {
        $query = $this->db->get_where('users',array('role' => "T"));
        return $query;
    }

    public function get_ta_list()
    {
        $query = $this->db->get_where('users',array('role' => "A"));
        return $query;
    }

    public function get_student_list()
    {
        $query = $this->db->get_where('users',array('role' => "S"));
        return $query;
    }

    public function get_course_list()
    {
        $query = $this->db->get('courses');
        return $query;
    }
    
    public function get_class_list()
    {
        $query = $this->db->get('classes');
        return $query;
    }

    public function get_class_teacher($courseid, $classid)
    {
        $query = $this->db->get_where('tch_belong',array('course' => $courseid, 'class' => $classid));
        return $query;
    }

    public function get_max_forumid()
    {
        $this->db->select_max('forumid');
        $query = $this->db->get('forum_relation');
        $row = $query->first_row();
        return $row->forumid;
    }

    public function get_forum_class_list($forumid)
    {
        $query = $this->db->get_where('forum_relation',array('forumid' => $forumid));
        return $query;
    }

    public function get_class_info($classid)
    {
        $query = $this->db->get_where('classes',array('id' => $classid));
        return $query;
    }
}


