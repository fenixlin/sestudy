  <div id="content" class="main box container-fluid">
    <div class="row-fluid">
      <div id="sidecontent" class="span3">
        <div id="sidebar">
          <ul class="nav nav-list">
            <li class="nav-header">导航</li>
            <li><a href="<?=site_url()?>intro.html">课程介绍</a></li>
            <li><a href="<?=site_url()?>outline.html">课程大纲</a></li>
            <li><a href="<?=site_url()?>tinfo.html">教师介绍</a></li>
            <li class="divider"></li>
            <li><a href="<?=site_url()?>account.html">学生账号管理</a></li>
            <li><a href="<?=site_url()?>group.html">学生分组</a></li>            
            <li class="divider"></li>
            <li><a href="<?=site_url()?>slide.html">课件管理</a></li>
            <li><a href="<?=site_url()?>upload.html">资料管理</a></li>
            <li><a href="<?=site_url()?>share.html">共享资源管理</a></li>
            <li class="divider"></li>
            <li><a href="<?=site_url()?>notice.html">消息发布</a></li>
            <li><a href="<?=site_url()?>assignment.html">作业管理</a></li>
            <li class="active"><a href="<?=site_url()?>forum.html">课程讨论区</a></li>
          </ul>
        </div> <!-- sidebar -->
      </div> <!-- sidecontent -->

      <div id="maincontent" class="span9">

<div class="accordion" id="accordion2">
  <a href="#myModal" role="button" class="btn btn-primary btn-block btn-large" data-toggle="modal">发表新话题</a>
  <!-- Modal -->
  <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3 id="myModalLabel">发表新话题</h3>
    </div>
    <form action = <?php echo site_url('forum/submit')?> method = "post">
      <div class="modal-body">
      <textarea id="new_content" name="new_content"></textarea>
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
        <input type="submit" class="btn btn-primary" value="提交">
      </div>
    </form>
  </div>
<?php
$this->load->helper('url');
date_default_timezone_set("Asia/Shanghai");

$i = 1;//用做循环
if(is_array($topic_array)==0 || count($topic_array)==0)
  echo "<h1><center>讨论区还没有话题</center></h1>";
else 
foreach ($topic_array as $topic) {
?>
  <div class="accordion-group" style="margin-bottom: 20px;margin-top: 20px;border: 3px solid #e5e5e5">
    <div class="container-fluid">
      
<?php  
    //echo '<tr bgcolor="red">';
    echo '<div class="row-fluid">';
    echo '<div class="span8"><h4>'.$topic['content'].'</h4></div>';
    echo '</div>';
    
    echo '<div class="row-fluid">';
    echo '<div class="span12" align="right">'.date("Y/m/d H:i:s", $topic['time']).'，'.$topic['author_id'].'</div>';
    echo '</div>';
    
    echo '<div class="row-fluid">';
    echo '<div class="span12" align="right">';
    echo '<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse'.$i.'">查看回复</a>';
    echo '</div>';
    echo '</div>';
      ;
    $comment_array = array_pop($topic);
    /*
    foreach ($topic as $key => $value) {
        if(is_array($value) == false)
        {
      //      echo "<td>";
            if($key == 'time')
               $value = date("Y/m/d h:i:s A", $value);
            echo $value;
      //      echo "</td>";
        }
        else
            $comment_array = $value;
    }
    */
    //echo '<td>';
    //echo '<a href="'.site_url('forum/reply/'.$topic['topic_id']).'">回复</a>';
    //echo '</td>';
    //echo "</tr>";
?>
    </div>
    <div id="collapse<?php echo $i;?>" class="panel-collapse collapse">
      <div class="accordion-inner">
<?php
    echo '<div class="row-fluid" style="border-bottom-width: 2px;border-bottom-style: solid;border-bottom-color: gray;">';
    echo '<form action='.site_url('forum/reply/'.$topic['topic_id']).' method = "post">';
    echo '<div class="span8"><textarea id="new_content" name="new_content" placeholder="输入你的评论..." style="height:20px;width:580px"></textarea></div>';
    echo '<div class="span4" align="right"><input class="btn btn-primary" type = "submit" value="回复"></div>';
    echo '</form>';
    echo '</div>';
    //打印评论
    if(count($comment_array) == 0)
      echo "没有评论";
    else
      foreach ($comment_array as $comment) {
          //echo "<tr>";
        echo '<div class="row-fluid">';
        echo '<div class="span12"><h5>'.$comment['content'].'</h5></div>';
        echo '</div>';
        echo '<div class="row-fluid" style="border-bottom-width: 2px;border-bottom-style: solid;border-bottom-color: gray;">';
        echo '<div class="span12" align="right">'.date("Y/m/d H:i:s", $comment['time']).'，'.$comment['author_id'].'</div>';
        echo '</div>';
        /*  foreach ($comment as $key => $value) 
          {
            //  echo "<td>";
              if($key == 'time')
                  $value = date("Y/m/d h:i:s A", $value);
              echo $value; 
            //  echo "</td>";
          }
          */
          //echo "</tr>";
      }

    $i = $i + 1;
?>

      </div>
    </div>
  </div>
<?php
}
?>
</div>

      </div> <!-- main content -->
    </div> <!-- row-fluid -->
  </div> <!-- content -->
