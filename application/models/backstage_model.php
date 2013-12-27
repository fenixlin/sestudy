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

    public function get_assistant_list()
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

    public function get_teacher_info($userid)
    {
        $query = $this->db->get_where('users',array('role' => "T", 'userid' => $userid));
        return $query->first_row();
    }

    public function get_assistant_info($userid)
    {
        $query = $this->db->get_where('users',array('role' => "A", 'userid' => $userid));
        return $query->first_row();
    }

    public function get_student_info($userid)
    {
        $query = $this->db->get_where('users',array('role' => "S", 'userid' => $userid));
        return $query->first_row();
    }

    public function get_class_info($classid)
    {
        $query = $this->db->get_where('classes',array('classid' => $classid));
        return $query->first_row();
    }

    public function get_class_teacher($courseid, $classid)
    {
        $query = $this->db->get_where('tch_belong',array('courseid' => $courseid, 'classid' => $classid));
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

    public function existing_id()
    {
        $tid = $this->input->post('username');
        $query = $this->db->get_where('users',array('userid' => $tid));
        if ($query->num_rows()>0) return TRUE;
            else return FALSE;
    }

    public function is_teaching($userid, $courseid, $classid)
    {
        $query = $this->db->get_where('tch_belong',array('userid' => $userid, 'courseid' => $courseid, 'classid' => $classid));
        if ($query->num_rows()>0) return TRUE;
            else return FALSE;
    }

    public function is_assisting($userid, $courseid, $classid)
    {
        $query = $this->db->get_where('ta_belong',array('userid' => $userid, 'courseid' => $courseid, 'classid' => $classid));
        if ($query->num_rows()>0) return TRUE;
            else return FALSE;
    }

    public function is_taking($userid, $courseid, $classid)
    {
        $query = $this->db->get_where('stu_belong',array('userid' => $userid, 'courseid' => $courseid, 'classid' => $classid));
        if ($query->num_rows()>0) return TRUE;
            else return FALSE;
    }

    public function insert_teacher()
    {
        $data = array
        (
            'userid' => $this->input->post('username'),
            'password' => $this->input->post('username'),
            'role' => "T",
            'email' => $this->input->post('email'),
            'name' => $this->input->post('name'),
            'major' => $this->input->post('major'),
            'tel' => $this->input->post('tel')   
        );
        $this->db->insert('users',$data);

        $classes = $this->input->post('class');
        foreach ($classes as $classid)
        {
            $row = $this->backstage_model->get_class_info($classid);
            $courseid = $row->courseid;

            $data = array
            (
                'userid' => $this->input->post('username'),
                'name' => $this->input->post('name'),
                'courseid' => $courseid,
                'classid' => $classid
            );
            $this->db->insert('tch_belong',$data);
        }
    }

    public function update_teacher($userid)
    {
        $data = array
        (            
            'email' => $this->input->post('email'),
            'name' => $this->input->post('name'),
            'major' => $this->input->post('major'),
            'tel' => $this->input->post('tel')
        );
        $this->db->update('users',$data,array('userid' => $userid));

        //删除所有归属信息，再重新插入
        $this->db->delete('tch_belong', array('userid' => $userid)); 
        $classes = $this->input->post('class');
        foreach ($classes as $classid)
        {
            $row = $this->backstage_model->get_class_info($classid);
            $courseid = $row->courseid;

            $data = array
            (
                'userid' => $this->input->post('username'),
                'name' => $this->input->post('name'),
                'courseid' => $courseid,
                'classid' => $classid
            );
            $this->db->insert('tch_belong',$data);
        }
    }

    public function delete_teacher($userid)
    {
        $this->db->delete('users', array('userid' => $userid));
        $this->db->delete('tch_belong', array('userid' => $userid)); 
    }

    public function insert_assistant()
    {
        $data = array
        (
            'userid' => $this->input->post('username'),
            'password' => $this->input->post('username'),
            'role' => "A",
            'email' => $this->input->post('email'),
            'name' => $this->input->post('name'),
            'major' => $this->input->post('major'),
            'tel' => $this->input->post('tel')   
        );
        $this->db->insert('users',$data);

        $classes = $this->input->post('class');
        foreach ($classes as $classid)
        {
            $row = $this->backstage_model->get_class_info($classid);            
            $courseid = $row->courseid;

            $data = array
            (
                'userid' => $this->input->post('username'),
                'name' => $this->input->post('name'),
                'courseid' => $courseid,
                'classid' => $classid
            );
            $this->db->insert('ta_belong',$data);
        }
    }

    public function update_assistant($userid)
    {
        $data = array
        (            
            'email' => $this->input->post('email'),
            'name' => $this->input->post('name'),
            'major' => $this->input->post('major'),
            'tel' => $this->input->post('tel')
        );
        $this->db->update('users',$data,array('userid' => $userid));

        //删除所有归属信息，再重新插入
        $this->db->delete('ta_belong', array('userid' => $userid)); 
        $classes = $this->input->post('class');
        foreach ($classes as $classid)
        {
            $row = $this->backstage_model->get_class_info($classid);
            $courseid = $row->courseid;

            $data = array
            (
                'userid' => $this->input->post('username'),
                'name' => $this->input->post('name'),
                'courseid' => $courseid,
                'classid' => $classid
            );
            $this->db->insert('ta_belong',$data);
        }
    }

    public function delete_assistant($userid)
    {
        $this->db->delete('users', array('userid' => $userid));
        $this->db->delete('ta_belong', array('userid' => $userid)); 
    }

    public function duplicate_courses()
    {
        $classes = $this->input->post('class');
        $courses = array();
        foreach ($classes as $classid)
        {
            $row = $this->backstage_model->get_class_info($classid);
            $courseid = $row->courseid;
            $courses[] = $courseid;
        }
        $uni_courses = array_unique($courses);
        if (count($uni_courses) != count($courses)) return TRUE;
        else return FALSE;
    }

    public function insert_student()
    {
        $data = array
        (
            'userid' => $this->input->post('username'),
            'password' => $this->input->post('username'),
            'role' => "S",
            'email' => $this->input->post('email'),
            'name' => $this->input->post('name'),
            'major' => $this->input->post('major'),
            'tel' => $this->input->post('tel')   
        );
        $this->db->insert('users',$data);

        $classes = $this->input->post('class');
        foreach ($classes as $classid)
        {
            $row = $this->backstage_model->get_class_info($classid);
            $courseid = $row->courseid;

            $data = array
            (
                'userid' => $this->input->post('username'),
                'courseid' => $courseid,
                'classid' => $classid
            );
            $this->db->insert('stu_belong',$data);
        }
    }

    public function update_student($userid)
    {
        $data = array
        (            
            'email' => $this->input->post('email'),
            'name' => $this->input->post('name'),
            'major' => $this->input->post('major'),
            'tel' => $this->input->post('tel')
        );
        $this->db->update('users',$data,array('userid' => $userid));

        //删除所有归属信息，再重新插入
        $this->db->delete('stu_belong', array('userid' => $userid)); 
        $classes = $this->input->post('class');
        foreach ($classes as $classid)
        {
            $row = $this->backstage_model->get_class_info($classid);            
            $courseid = $row->courseid;

            $data = array
            (
                'userid' => $this->input->post('username'),
                'courseid' => $courseid,
                'classid' => $classid
            );
            $this->db->insert('stu_belong',$data);
        }
    }

    public function delete_student($userid)
    {
        $this->db->delete('users', array('userid' => $userid));
        $this->db->delete('stu_belong', array('userid' => $userid)); 
    }

    public function insert_class()
    {
        $courseid = $this->input->post('courseid');
        $query = $this->db->get_where('courses', array('courseid' => $courseid));
        $row = $query->first_row();
        $coursename = $row->name;
        $data = array
        (
            'courseid' => $courseid,
            'coursename' => $coursename,
            'term' => $this->input->post('term'),
            'time' => $this->input->post('time'),            
            'major' => $this->input->post('major')
        );
        $this->db->insert('classes',$data);

        $query = $this->db->get_where('classes', $data);
        $row = $query->first_row();
        $classid = $row->classid;

        $teachers = $this->input->post('teacher');
        foreach ($teachers as $teacherid)
        {
            $row = $this->backstage_model->get_teacher_info($teacherid);
            $name = $row->name;

            $data = array
            (
                'userid' => $teacherid,
                'name' => $name,
                'courseid' => $courseid,
                'classid' => $classid
            );
            $this->db->insert('tch_belong',$data);
        }

        $assistants = $this->input->post('assistant');
        foreach ($assistants as $assistantid)
        {
            $row = $this->backstage_model->get_assistant_info($assistantid);
            $name = $row->name;

            $data = array
            (
                'userid' => $assistantid,
                'name' => $name,
                'courseid' => $courseid,
                'classid' => $classid
            );
            $this->db->insert('stu_belong',$data);
        }
    }

    public function edit_class($classid)
    {
        $courseid = $this->input->post('courseid');
        $query = $this->db->get_where('courses', array('courseid' => $courseid));
        $row = $query->first_row();
        $coursename = $row->name;
        $data = array
        (
            'courseid' => $courseid,
            'coursename' => $coursename,
            'term' => $this->input->post('term'),
            'time' => $this->input->post('time'),            
            'major' => $this->input->post('major')
        );
        $this->db->update('classes', $data, array('classid' => $classid));
        
        //删除所有归属信息，再重新插入
        $this->db->delete('tch_belong', array('classid' => (int)$classid)); 

        $teachers = $this->input->post('teacher');
        foreach ($teachers as $teacherid)
        {
            $row = $this->backstage_model->get_teacher_info($teacherid);
            $name = $row->name;

            $data = array
            (
                'userid' => $teacherid,
                'name' => $name,
                'courseid' => $courseid,
                'classid' => $classid
            );
            $this->db->insert('tch_belong',$data);
        }

        //删除所有归属信息，再重新插入
        $this->db->delete('ta_belong', array('classid' => (int)$classid)); 

        $assistants = $this->input->post('assistant');
        foreach ($assistants as $assistantid)
        {
            $row = $this->backstage_model->get_assistant_info($assistantid);
            $name = $row->name;

            $data = array
            (
                'userid' => $assistantid,
                'name' => $name,
                'courseid' => $courseid,
                'classid' => $classid
            );
            $this->db->insert('ta_belong',$data);
        }
    }

    public function delete_class($classid)
    {
        $this->db->delete('classes', array('classid' => $classid));
        $this->db->delete('tch_belong', array('classid' => $classid));
        $this->db->delete('ta_belong', array('classid' => $classid));
        $this->db->delete('stu_belong', array('classid' => $classid));
        $this->db->delete('forum_relation', array('classid' => $classid));
    }

    public function insert_forum()
    {
        //假设论坛累积量不会超过那么多个=.=
        $forumid = $this->backstage_model->get_max_forumid() + 1;
        $classes = $this->input->post('class');
        foreach ($classes as $classid)
        {
            $data = array
            (
                'forumid' => $forumid,
                'classid' => $classid
            );
            $this->db->insert('forum_relation',$data);
        }
    }

    public function delete_forum($forumid)
    {
        $this->db->delete('forum_relation', array('forumid' => $forumid));
    }

}


