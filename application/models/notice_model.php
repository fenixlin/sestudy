<?php
class Notice_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    //返回查询结果，按时间从近到远排序
    public function get_data()
    {
        $data = array
        (
            'course' => $this->session->userdata('course')
        );
        
        $query = $this->db->get_where('notice',array('course' => $data['course']));

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
        $data = array
        (
            'inhome' => $this->input->post('inhome'),
            'userid' => $this->session->userdata('userid'),            
            'username' => $this->input->post('username'),            
            'title' => $this->input->post('title'),
            'detail' => $this->input->post('detail'),
            'date' => $this->input->post('date'),
            'datetime' => $this->input->post('datetime')
        );
        $this->db->update('notice',$data,array('course' => $course));        
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
        $course = $this->session->userdata('course');
        $data = array
        (
            'inhome' => $this->input->post('inhome'),
            'userid' => $this->session->userdata('userid'),            
            'username' => $this->input->post('username'),            
            'title' => $this->input->post('title'),
            'detail' => $this->input->post('detail'),
            'date' => $this->input->post('date'),
            'datetime' => $this->input->post('datetime')
        );
        $this->db->update('intro',$data,array('course' => $course));        
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
}


