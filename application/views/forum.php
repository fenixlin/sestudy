  <div id="content" class="main box container-fluid">
    <div class="row-fluid">
      <div id="sidecontent" class="span3">
        <div id="sidebar">
          <ul class="nav nav-list">
            <li class="nav-header">导航</li>
            <li><a href="intro.html">课程介绍</a></li>
            <li><a href="outline.html">课程大纲</a></li>
            <li><a href="teacher.html">教师介绍</a></li>
            <li class="divider"></li>
            <li><a href="notice.html">课程通知</a></li>
            <li><a href="slide.html">课件下载</a></li>
            <li><a href="resource.html">资料下载</a></li>
            <li><a href="share.html">共享资料</a></li>
            <li><a href="assignment.html">作业提交</a></li>
            <li class="active"><a href="forum.html">课程讨论区</a></li>
          </ul>
        </div> <!-- sidebar -->
      </div> <!-- sidecontent -->

      <div id="maincontent" class="span9">

      <?php
$this->load->helper('url');
//die(print_r($topic_array));

//echo "<table border = 1>";
foreach ($topic_array as $topic) {
?>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
<?php  
    echo '<tr bgcolor="red">';
    $comment_array = array();
    foreach ($topic as $key => $value) {
        if(is_array($value) == false)
        {
            echo "<td>";
            if($key == 'time')
               $value = date("Y/m/d h:i:s A", $value);
            echo $value;
            echo "</td>";
        }
        else
            $comment_array = $value;
    }
    echo '<td>';
    echo '<a href="'.site_url('forum/reply/'.$topic['topic_id']).'">回复</a>';
    echo '</td>';
    echo "</tr>";
?>
</a>
</h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
<?php
    //打印评论
    foreach ($comment_array as $comment) {
        echo "<tr>";
        foreach ($comment as $key => $value) 
        {
            echo "<td>";
            if($key == 'time')
                $value = date("Y/m/d h:i:s A", $value);
            echo $value; 
            echo "</td>";
        }
        echo "</tr>";
    }
?>
      </div>
    </div>
  </div>
<?php
}
echo '<a href="'.site_url('forum/submit').'">发布新话题</a>';
?>
      </div> <!-- main content -->
    </div> <!-- row-fluid -->
  </div> <!-- content -->
