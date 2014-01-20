  <div id="content" class="main box container-fluid">
    <div class="row-fluid">
      <div id="sidecontent" class="span3">
        <div id="sidebar">
          <ul class="nav nav-list">
            <li class="nav-header">示例</li>
            <li><a href="#">课程介绍</a></li>
            <li><a href="#">课程大纲</a></li>
            <li><a href="#">教师介绍</a></li>
            <li class="divider"></li>
            <li><a href="#">课程通知</a></li>
            <li><a href="#">课件下载</a></li>
            <li><a href="#">资料下载</a></li>
            <li><a href="#">共享资料</a></li>
            <li class="active"><a href="assignment.html">作业提交</a></li>
            <li><a href="#">课程讨论区</a></li>
          </ul>
        </div> <!-- sidebar -->
      </div> <!-- sidecontent -->

      <div id="maincontent" class="span9">
       <legend><strong>作业列表</strong></legend>
       <table class="table table-hover">
        <tbody>
          <tr class="info">
            <td style="width:20%">
              <strong>题目</strong>
            </td>
            <td style="width:45%">
              <strong>要求</strong>
            </td>            
            <td style="width:20%">
              <strong>截止时间</strong>
            </td>
            <td style="width:20%">
              <strong>成绩</strong>
            </td>
            <td>
              &nbsp;
            </td>
          </tr>
          <?php
          $flag = false;
          $courseid = 1;
          $classid = 1;
          $query = $this->assignment_model->get_data($classid, $courseid);
          foreach ($query->result() as $row) {
            $r = rand()%30 + 70;
            echo "<tr";
            if ($flag) echo " class=\"info\"";
            echo ">";
            echo "<td>".$row->title."</td>";
            echo "<td>".$row->requirement."</td>";
            echo "<td>".$row->date."</td>";
            echo "<td>".$r."</td>";
            echo "<td>"."<a href=\"".site_url()."assignment/handin.html\">"."<i class=\"icon-upload\"></a></i>";
            echo "</td>";
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