<?php
class Forum_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function getTopicAndComment()
    {
        $this->db->order_by("time", "desc"); 
        $topic_array = $this->db->get('Topic');
        
        if($topic_array->num_rows() == 0)
            return false;
        
        $topic_array = $topic_array->result_array();
        
        foreach($topic_array as &$topic_var)
        {
            $this->db->where('topic_id', $topic_var['topic_id']);
            $this->db->order_by("time", "desc"); 
            $comment_array = $this->db->get('Topic_Comment');
            $comment_array = $comment_array->result_array();

            array_push($topic_var, $comment_array);
        }
        
        //die(print_r($topic_array));
        
        /*
        $query = "SELECT * from Topic, Topic_Comment where Topic.topic_id = Topic_Comment.topic_id";
        $topic_array = $this->db->query($query);
        $topic_array = $topic_array -> result_array();
        */
        
        return $topic_array;
    }

    public function insert_topic($insert_data)
    {
        return $this->db->insert('Topic', $insert_data);
    }

    public function insert_comment($insert_data)
    {
        return $this->db->insert('Topic_Comment', $insert_data);
    }

    public function increment_num_of_comment($topic_id)
    {
        $query = 'SELECT number_of_comment from Topic WHERE topic_id = '.$topic_id.'';
        $result = $this->db->query($query);
        $result = $result->row_array();
        $number_of_comment = $result['number_of_comment'];

        $number_of_comment += 1;
        $query = 'UPDATE Topic SET number_of_comment = '.$number_of_comment.' WHERE topic_id = '.$topic_id;
        
        return $this->db->query($query);
    }

    public function exist_topic_id($topic_id)
    {
        $query = 'SELECT topic_id from Topic WHERE topic_id = '.$topic_id;
        $result = $this->db->query($query);
        $result = $result->num_rows();

        return ($result == 1);
    }
}
?>