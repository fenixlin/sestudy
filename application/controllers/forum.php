<?php
class Forum extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Forum_model");
        $this->load->helper('url');
    }
    public function index()
    {
        $topic_array = array();
        $topic_array = $this->Forum_model->getTopicAndComment();

        $data = array("topic_array" => $topic_array);
        
        $this->load->view('htmlhead');
        $this->load->view('student/course_header');
        $this->load->view('forum', $data);
        $this->load->view('footer');
        
    }

    public function submit()
    {
        //验证
        #code here
        $userid = "student";
        $class_id = 1;
        $group_id = 1;

        if($this->input->post('content') == false)
        {
            $this->load->view('submit');
        }
        else
        {
            $content = $this->input->post('content');
            $author_id = $userid;
            $time = time();
            $data = array(
                'author_id' => $author_id,
                'class_id' => $class_id,
                'group_id' => $group_id,
                'time' => $time,
                'number_of_comment' => 0,
                'content' => $content);
            $this->Forum_model->insert_topic($data);

            header('Location: '.site_url('forum/index').'');
        }
    }

    public function reply($topic_id)
    {
        //验证
        #code here
        $userid = "student";
        $class_id = 1;
        $group_id = 1;

        if($this->input->post('content') == false)
        {
            $data = array('topic_id' => $topic_id);
            $this->load->view('reply', $data);
        }
        else
        {

            if($this->Forum_model->exist_topic_id($topic_id) == true)
            {
                $content = $this->input->post('content');
                $author_id = $userid;
                $time = time();
                $data = array(
                    'topic_id' => $topic_id,
                    'author_id' => $author_id,
                    'time' => $time,
                    'content' => $content
                    );
                $this->Forum_model->insert_comment($data);
                $this->Forum_model->increment_num_of_comment($topic_id);
                
                header('Location: '.site_url('forum/index').'');
            }
            else
            {
                die("错误");
            }
        }
    }

}
?>
