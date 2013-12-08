<?php
class Notice_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    //返回查询结果，按时间从近到远排序
    public function get_course_data()
    {
        $data = array
        (
            'course' => $this->session->userdata('course')
        );

        $this->db->order_by('datetime', 'desc');

        $query = $this->db->get_where('notice',array('course' => $data['course']));

        return $query;
    }

    public function get_home_data()
    {   
        $this->db->order_by('datetime', 'desc');
        $query = $this->db->get_where('notice',array('inhome' => 1));

        return $query;
    }

    //查询某一条消息
    public function get_notice($nid)
    {
        $query = $this->db->get_where('notice', array('nid' => $nid));
        return $query->first_row();
    }

    //插入数据
    public function insert()
    {
        $course = $this->session->userdata('course');
        $userid = $this->session->userdata('userid');

        if ($this->input->post('inhome') == 'on')
        {
            $inhome = 1;
        }
        else
        {
            $inhome = 0;
        }

        date_default_timezone_set('ETC/GMT-8');
        $date = strftime('%Y-%m-%d',time());
        $datetime = strftime('%Y-%m-%d %H:%M:%S',time());


        $data = array
        (
            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role')
        );        
        $query = $this->db->get_where('users',array('userid' => $data['userid'], 'role' => $data['role']));
        $username = $query->first_row()->name;

        $this->db->select_max('nid', 'max_nid');
        $result = $this->db->get('notice')->row_array();
        $nid = $result['max_nid'] + 1;

        $data = array
        (
            'nid' => $nid,
            'course' => $course,
            'inhome' => $inhome,
            'userid' => $userid,           
            'username' => $username,            
            'title' => $this->input->post('title'),
            'detail' => $this->input->post('detail'),
            'date' => $date,
            'datetime' => $datetime
        );
        $this->db->insert('notice',$data);
    }

    //更新数据
    public function update($nid)
    {
        $course = $this->session->userdata('course');
        $userid = $this->session->userdata('userid');

        if ($this->input->post('inhome') == 'on')
        {
            $inhome = 1;
        }
        else
        {
            $inhome = 0;
        }

        date_default_timezone_set('ETC/GMT-8');
        $date = strftime('%Y-%m-%d',time());
        $datetime = strftime('%Y-%m-%d %H:%M:%S',time());


        $data = array
        (
            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role')
        );        
        $query = $this->db->get_where('users',array('userid' => $data['userid'], 'role' => $data['role']));
        $username = $query->first_row()->name;

        $data = array
        (
            'inhome' => $inhome,
            'userid' => $userid,           
            'username' => $username,            
            'title' => $this->input->post('title'),
            'detail' => $this->input->post('detail'),
            'date' => $date,
            'datetime' => $datetime
        );
        $this->db->update('notice',$data,array('course' => $course, 'nid' => $nid));        
    }

    //删除数据
    public function delete($nid)
    {
        $this->db->delete('notice', array('nid' => $nid));
    }

    public function set_nid()
    {
        $this->db->select_max('nid', 'max_nid');
        $result = $this->db->get('notice')->row_array();
        $nid = $result['max_nid'] + 1;
        return $nid;
    }

    public function get_title($title)
    {
        if (strlen($title)<=50)
        {
            $result = $title;
        }
        else
        {
            $result = "";
            for ($i=0; $i<75; $i++)
            {
                $result = $result.$title[$i];
            }
            $result = $result."...";
        }
        return $result;
    }

    public function get_course($course)
    {
        if ($course == 1)
        {
            $name = '[需求]';
        }
        else if ($course == 2)
        {
            $name = '[项目]';
        }
        else if ($course == 3)
        {
            $name = '[质量]';
        }
        return $name;
    }
}


