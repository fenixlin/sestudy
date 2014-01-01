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


      <legend><strong>所有讨论区列表</strong></legend>
      <?php
        $maxfid = (int)($this->backstage_model->get_max_forumid());
        for ($i = 0; $i < $forum_num; $i ++) 
        { 
          $forumid = $forumid_array[$i]['forumid'];
          //die(print_r($forumid_array));
          echo "<div class=\"title\"><span class=\"title\">讨论区".$forumid."包括班级：</span>";
          echo '<a href="'.site_url('forum/index/'.$i).'" class="btn btn-primary" style="float:right;">进入讨论区'.$forumid.'</a></div>';
          
          echo "<table class=\"table table-hover wrapped\">
                  <tbody>
                    <tr class=\"info\">
                      <td style=\"width:5%\">
                        <strong>ID</strong>
                      </td>
                      <td style=\"width:15%\">
                        <strong>学期</strong>
                      </td>
                      <td style=\"width:15%\">
                        <strong>课程</strong>
                      </td>
                      <td style=\"width:25%\">
                        <strong>上课时间</strong>
                      </td>
                      <td style=\"width:20%\">
                        <strong>面向专业</strong>
                      </td>
                      <td style=\"width:15%\">
                        <strong>任课教师</strong>
                      </td>
                    </tr>";
          $forumlist = $this->backstage_model->get_forum_class_list($forumid);
          foreach ($forumlist->result() as $forum)
          {
            echo "<tr>";
            $thisclass = $this->backstage_model->get_class_info($forum->classid);            
            echo "<td>".$thisclass->classid."</td>";
            echo "<td>".$thisclass->term."</td>";
            echo "<td>".$thisclass->coursename."</td>";
            echo "<td>".$thisclass->time."</td>";
            echo "<td>".$thisclass->major."</td>";
            $tchlist = $this->backstage_model->get_class_teacher($thisclass->courseid, $thisclass->classid);
            echo "<td>";
            foreach ($tchlist->result() as $tch)
            {
              echo $tch->name."&nbsp;";
            }
            echo "</td>";
            echo "</tr>";
          }
          echo    "</tbody>        
                </table>";
        }
      ?>


      </div>
      </div> <!-- main content -->
    </div> <!-- row-fluid -->
  </div> <!-- content -->
