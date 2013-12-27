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
            <li class="active"><a href="<?=site_url()?>group.html">学生分组</a></li>            
            <li class="divider"></li>
            <li><a href="<?=site_url()?>slide.html">课件管理</a></li>
            <li><a href="<?=site_url()?>upload.html">资料管理</a></li>
            <li><a href="<?=site_url()?>share.html">共享资源管理</a></li>
            <li class="divider"></li>
            <li><a href="<?=site_url()?>notice.html">消息发布</a></li>
            <li><a href="<?=site_url()?>assignment.html">作业管理</a></li>
            <li><a href="<?=site_url()?>forum.html">课程讨论区</a></li>
          </ul>
        </div> <!-- sidebar -->
      </div> <!-- sidecontent -->

      <div id="maincontent" class="span9">
        <legend><strong>请选择您要操作的班级</strong></legend>
      <table class="table table-hover">
        <tbody>
          <tr class="info">
            <td style="width:5%">
              <strong>id</strong>
            </td>
            <td style="width:20%">
              <strong>学期</strong>
            </td>
            <td style="width:20%">
              <strong>上课时间</strong>
            </td>            
            <td style="width:25%">
              <strong>面向专业</strong>
            </td>
            <td style="width:20%">
              <strong>任课老师</strong>
            </td>
            <td>
              &nbsp;
            </td>
          </tr>
          <?php
            $courseid = $this->session->userdata('course');
            $userid = $this->session->userdata('userid');
            $query = $this->account_model->get_teacher_class_list($userid, $courseid);
            $flag = FALSE;
            foreach ($query->result() as $row)
            {
              echo "<tr";
              if ($flag) echo " class=\"info\"";
              echo ">";

              echo "<td>".$row->classid."</td>";
              echo "<td>".$row->term."</td>";
              echo "<td>".$row->time."</td>";
              echo "<td>".$row->major."</td>";

              $tchlist = $this->account_model->get_class_teacher($courseid, $row->classid);              
              echo "<td>";
              foreach ($tchlist->result() as $tch)
              {
                echo $tch->name."&nbsp;";
              }
              echo "</td>";

              echo "<td><a class=\"btn btn-primary\" href=\"".site_url()."group\\operate\\".$row->classid."\">选择</i></a>";              

              echo "</tr>";

              if (!$flag) $flag = TRUE;
                else $flag = FALSE;
            }
          ?>
        </tbody>        
      </table>

       
      </div> <!-- main content -->
    </div> <!-- row-fluid -->
  </div> <!-- content -->

