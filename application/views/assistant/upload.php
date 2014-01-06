  <div id="content" class="main box container-fluid">
    <div class="row-fluid">
      <div id="sidecontent" class="span3">
        <div id="sidebar">
          <ul class="nav nav-list">
            <li class="nav-header">导航</li>
            <li ><a href="<?=site_url()?>intro.html">课程介绍</a></li>
            <li><a href="<?=site_url()?>outline.html">课程大纲</a></li>
            <li><a href="<?=site_url()?>tinfo.html">教师介绍</a></li>
            <li class="divider"></li>
            <li><a href="<?=site_url()?>account.html">学生账号管理</a></li>
            <li><a href="<?=site_url()?>group.html">学生分组</a></li>            
            <li class="divider"></li>
            <li><a href="<?=site_url()?>slide.html">课件管理</a></li>
            <li class="active"><a href="<?=site_url()?>upload.html">资料管理</a></li>
            <li><a href="<?=site_url()?>share.html">共享资源管理</a></li>
            <li class="divider"></li>
            <li><a href="<?=site_url()?>notice.html">消息发布</a></li>
            <li><a href="<?=site_url()?>assignment.html">作业管理</a></li>
            <li><a href="<?=site_url()?>forum.html">课程讨论区</a></li>
          </ul>
        </div> <!-- sidebar -->
      </div> <!-- sidecontent -->
	  

      <div id="maincontent" class="span9">
		<a href="#myModal" role="button" class="btn btn-primary btn-lg" data-toggle="modal">上传资料</a>
		<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel">上传资料</h3>
			</div>
			<form action="/sestudy/index.php/upload/up" method="post" enctype="multipart/form-data">
				&nbsp&nbsp&nbsp&nbsp<input type="file" name="upfile">

			<div class="modal-body">
				<textarea id="information" name="information" placeholder="简介"></textarea>
			</div>
			
			&nbsp&nbsp&nbsp
			<?php
				$courseid = $this->session->userdata('course');
				$userid = $this->session->userdata('userid');
				$query = $this->account_model->get_assistant_class_list($userid, $courseid);
			?>
			<select class="form-control" id="classid" name="classid">
			<?php foreach ($query->result() as $row) { ?>
				<option value=<?=$row->classid ?>><?=$row->time ?></option>
			<?php } ?>
			</select>
			
			<div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
				<input type="submit" class="btn btn-primary" name="sub" value="提交" />
			</div>
		</form>
		</div>
		<br><br>
		<?php $userid = $this->session->userdata('userid'); ?>
		<?php $courseid = $this->session->userdata('course');  ?>
		<?php $data = $this->recourse_model->seeta_course_upload($userid, $courseid);?>
	    <?php $i = 1; ?>
        <table align="center" class="table table-hover" style="border-left: 1px solid #dddddd;border-right: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-collapse: separate;-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;">
          <tbody>
            <tr class="info">
              <td style="width:45%"><strong>文件名</strong></td>
              <td width =13% style="text-align:center"><strong>上传人</strong></td>
			  <td style="text-align:center" width =20%><strong>班级</strong></td>
			  <td style="text-align:center" width =16%><strong>日期</strong></td>
			  <td> </td>
			  <td> </td>
			  <td> </td>
            </tr>
			<?php foreach($data as $key => $value) { ?>
			<tr>
              <td><?=$data[$key]->filename_see?></td>
              <td style="text-align:center"><?=$data[$key]->name?></td>
			  
			  <td>
				<?php $classdata = $this->recourse_model->get_time($data[$key]->classid);?>
				<?php //var_dump($data); ?>
				<?=$classdata[0]->time   ?>
			  </td>
			  
			  <td style="text-align:center"><?=$data[$key]->uploaddate?></td>
			  <td><a href="#myModal<?=$key?>" data-toggle="modal"><i class="icon-refresh"></i></a></td>
				
				
				<div id="myModal<?=$key?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-header">
				    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 id="myModalLabel">重上传</h3>
				  </div>
				  <form action="/sestudy/index.php/upload/reup/<?=$data[$key]->filename?>" method="post" enctype="multipart/form-data">
				    &nbsp&nbsp&nbsp&nbsp<input type="file" name="upfile">

				  <div class="modal-body">
				    <textarea id="information" name="information" placeholder="简介"></textarea>
				  </div>
				  
				  &nbsp&nbsp&nbsp
				<?php $query = $this->account_model->get_assistant_class_list($userid, $courseid); ?>
				<select class="form-control" id="classid" name="classid">
					<?php foreach ($query->result() as $row) { ?>
					<option value=<?=$row->classid ?>><?=$row->time ?></option>
					<?php } ?>
				</select>
				  
				  <div class="modal-footer">
				    <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
				    <input type="submit" class="btn btn-primary" name="sub" value="提交" />
				  </div>
				  </form>
				</div>
				
			  <td><a href="#my2Modal<?=$key?>" data-toggle="modal"><i class="icon-download-alt"></i></a></td>
				<div id="my2Modal<?=$key?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h3 id="myModalLabel"><?=$data[$key]->filename_see?></h3>
					</div>
					
					<div class="modal-body">
						<h4>简介：</h4>
						<h5><small>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?=$data[$key]->information?></small></h5>
					</div>
					<div class="modal-footer">
						<button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
						<a href="<?=site_url()?>upload/download/<?=$data[$key]->filename?>" role="button" class="btn btn-primary">下载</a>
					</div>
				</div>
			  
			  
			  
			  <td><a href="javascript:HandleOnClose('<?=site_url()?>upload/delete_up/<?=$data[$key]->filename?>')"><i class="icon-remove"></i></a></td>
            </tr>
			<?php } ?>
			</tbody>
        </table>
      </div> <!-- main content -->
    </div> <!-- row-fluid -->
  </div> <!-- content -->
  
  
<script language="JavaScript" type="text/JavaScript">
function HandleOnClose(url) {
  var close = confirm("确认删除该资料？");
  if ( close) {
    window.open(url, '_self');
  }
  else
  {
    window.event;
  }
}
</script>
<!--
 <script language="javascript"> 
    if(empty($_POST['sub']))
	{
		echo "<script language=\'javascript\'>alert('请选择文件');</script>";
	}
</script> -->
