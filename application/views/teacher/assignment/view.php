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
          <li class="active"><a href="<?=site_url()?>assignment.html">作业管理</a></li>
          <li><a href="<?=site_url()?>forum.html">课程讨论区</a></li>
        </ul>
      </div> <!-- sidebar -->
    </div> <!-- sidecontent -->

    <div id="maincontent" class="span9">
     <legend><strong>上交作业列表</strong></legend>
     <table class="table table-hover">
      <tbody>
        <tr class="info">
          <td style="width:20%">
            <strong>学生姓名</strong>
          </td>
          <td style="width:40%">
            <strong>作业名</strong>
          </td>  
          <td style="width:20%">
            <strong>上传时间</strong>
          </td>
          <td>
            <strong>成绩</strong>
          </td>
          <td>
            &nbsp;
          </td>
        </tr>
        <?php
        $flag = false;
        $query = $this->grade_model->get_data();
        foreach ($query->result() as $row) {
          echo "<tr";
          if ($flag) echo " class=\"info\"";
          echo ">";
          echo "<td>".$row->name."</td>";
          echo "<td>".$row->title."</td>";
          echo "<td>".$row->date."</td>";
          echo "<td>".$row->grade."</td>";
          echo "<td><a href=#><i class=\"icon-download\"></i></a>&nbsp";
          echo "<a href=".site_url()."assignment/grade/".$row->title."><i class=\"icon-thumbs-up\"></i></a>";
          echo "</td>";
          echo "</tr>";
          if (!$flag) $flag = TRUE;
          else $flag = FALSE;
        }
        ?>
    </tbody>
  </table>
  <a class="btn" href="javascript:history.back(-1)" style="float:right;">返回</a>
</div> <!-- main content -->
</div> <!-- row-fluid -->
</div> <!-- content -->