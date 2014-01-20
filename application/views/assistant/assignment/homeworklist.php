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
      <a href="<?=site_url()?>assignment/assignhomework/<?=$this->session->userdata('clsid')?>">
       <button class="btn btn-primary" style="float:right;">发布新作业</button>
     </a>
     <legend><strong>作业列表</strong></legend>
     <table class="table table-hover">
      <tbody>
        <tr class="info">
          <td style="width:20%">
            <strong>题目</strong>
          </td>
          <td style="width:50%">
            <strong>要求</strong>
          </td>            
          <td style="width:20%">
            <strong>截止时间</strong>
          </td>
          <td>
            &nbsp;
          </td>
        </tr>
        <?php
        $flag = false;
        $courseid = $this->session->userdata('course');
        $classid = $this->session->userdata('clsid');
        $query = $this->assignment_model->get_data($classid, $courseid);
        foreach ($query->result() as $row) {
          echo "<tr";
          if ($flag) echo " class=\"info\"";
          echo ">";
          echo "<td>".$row->title."</td>";
          echo "<td>".$row->requirement."</td>";
          echo "<td>".$row->date."</td>";
          echo "<td>"."<a href=".site_url()."assignment/edit/".$row->number."><i class=\"icon-edit\"></i></a>&nbsp;";
          echo "<a href=\"javascript:HandleOnClose('".site_url()."assignment/delete/".$row->number."')\"><i class=\"icon-remove\"></i></a>";
          echo "<a href=\"".site_url()."assignment/view.html\"><i class=\"icon-folder-open\"></i></a>&nbsp;";
          echo "</td>";
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

<script language="JavaScript" type="text/JavaScript">
function HandleOnClose(url) {
  var close = confirm("确认删除此作业？");
  if ( close) {
    window.open(url, '_self');
  }
  else
  {
    window.event;
  }
}
</script>