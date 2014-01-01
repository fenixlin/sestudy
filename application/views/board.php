  <div id="content" class="main box container-fluid">
    <div class="row-fluid">
      
      
<div class="accordion" id="accordion2">
  <a href="#myModal" role="button" class="btn btn-primary btn-block btn-large" data-toggle="modal">发表新话题</a>
  <!-- Modal -->
  <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3 id="myModalLabel">发表新话题</h3>
    </div>
    <form action = <?php echo site_url('board/submit/'.$current_page)?> method = "post">
      <div class="modal-body">
      <textarea id="new_content" name="new_content"></textarea>
      <input id="noname" name="noname" type="checkbox" value="1">匿名</input>
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
    if($topic['noname'] == false)
      echo '<div class="span12" align="right">'.date("Y/m/d H:i:s", $topic['time']).'，'.$topic['author_name'].'</div>';
    else
      echo '<div class="span12" align="right">'.date("Y/m/d H:i:s", $topic['time']).'，匿名</div>';
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
    echo '<form action='.site_url('board/reply/'.$topic['topic_id'].'/'.$current_page).' method = "post">';
    echo '<div class="span10"><textarea id="new_content" name="new_content" placeholder="输入你的评论..." style="height:20px;width:560px"></textarea></div>';
    echo '<div class="span1"><input id="noname" name="noname" type="checkbox" value="1">匿名</input></div>';
    echo '<div class="span1" align="right"><input class="btn btn-primary" type = "submit" value="回复"></div>';
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
        if($comment['noname'] == false)
          echo '<div class="span12" align="right">'.date("Y/m/d H:i:s", $comment['time']).'，'.$comment['author_name'].'</div>';
        else
          echo '<div class="span12" align="right">'.date("Y/m/d H:i:s", $comment['time']).'，匿名</div>';
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
<center>第
<?php
for($i = 1; $i < $total_page; $i++)
{
  if($i == $current_page)
    echo $i;
  else
    echo '<a href="'.site_url('board/index/'.$i).'">'.$i.'</a>';
}
?>
页</center>
      </div> <!-- main content -->
    </div> <!-- row-fluid -->
  </div> <!-- content -->
