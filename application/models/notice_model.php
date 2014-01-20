<?php
class Notice_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }


    //返回分页显示的所有课程通知，按时间从近到远排序
    public function course_data($limit, $offset)
    {
        $course = $this->session->userdata('course');

        $this->db->order_by('datetime', 'desc');
        $this->db->where('course', $course);
        $query = $this->db->get('notice', $limit, $offset);

        return $query;
    }

    //返回课程通知的总数
    public function course_data_sum()
    {
        $course = $this->session->userdata('course');

        $this->db->where('course', $course);
        $sum = $this->db->count_all_results('notice');

        return $sum;
    }

    //返回课程通知查询结果，按时间从近到远排序
    public function course_search($search, $limit, $offset)
    {
        $course = $this->session->userdata('course');

        $this->db->order_by('datetime', 'desc');
        $this->db->like('title', $search);
        $this->db->where('course', $course);
        $query = $this->db->get('notice', $limit, $offset);
        
        return $query;
    }

    //返回课程通知查询结果总数
    public function course_search_sum($search)
    {
        $course = $this->session->userdata('course');

        $this->db->like('title', $search);
        $this->db->where('course', $course);
        $sum = $this->db->count_all_results('notice');

        return $sum;
    }

    //返回分页显示的所有主页通知，按时间从近到远排序
    public function home_data($limit, $offset)
    {   
        $this->db->order_by('datetime', 'desc');
        $this->db->where('inhome', 1);
        $query = $this->db->get('notice', $limit, $offset);

        return $query;
    }

    //返回主页通知的总数
    public function home_data_sum()
    {   
        $this->db->where('inhome', 1);
        $sum = $this->db->count_all_results('notice');

        return $sum;
    }

    //返回主页通知查询结果，按时间从近到远排序
    public function home_search($search, $limit, $offset)
    {           
        $this->db->order_by('datetime', 'desc');
        $this->db->like('title', $search);
        $this->db->where('inhome', 1);
        $query = $this->db->get('notice', $limit, $offset);

        return $query;
    }

    //返回主页通知查询结果总数
    public function home_search_sum($search)
    {   
        $this->db->like('title', $search);
        $this->db->where('inhome', 1);
        $sum = $this->db->count_all_results('notice');

        return $sum;
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
        $date = strftime('%Y-%m-%d', time());
        $datetime = strftime('%Y-%m-%d %H:%M:%S', time());


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
        $date = strftime('%Y-%m-%d', time());
        $datetime = strftime('%Y-%m-%d %H:%M:%S', time());


        $data = array
        (
            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role')
        );        
        $query = $this->db->get_where('users', array('userid' => $data['userid'], 'role' => $data['role']));
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
        $this->db->update('notice', $data, array('course' => $course, 'nid' => $nid));        
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
        if (strlen($title)<=75)
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


