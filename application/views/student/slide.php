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
            <li><a href="<?=site_url()?>notice.html">课程通知</a></li>
            <li class="active"><a href="<?=site_url()?>slide.html">课件下载</a></li>
            <li><a href="<?=site_url()?>upload.html">资料下载</a></li>
            <li><a href="<?=site_url()?>share.html">共享资料</a></li>
            <li><a href="<?=site_url()?>assignment.html">作业提交</a></li>
            <li><a href="<?=site_url()?>forum.html">课程讨论区</a></li>
          </ul>
        </div> <!-- sidebar -->
      </div> <!-- sidecontent -->
	  
	  <div id="maincontent" class="span9">
	  
	  <?php $courseid = $this->session->userdata('course');  ?>
	  <?php $data = $this->slide_model->see_stu_class($courseid);?>
	  <?php $classid = $data[0] ->classid;?>
	  <?php $data = $this->slide_model->see_class_upload($classid);?>
	  <?php //echo $classid ;?>
	  <table class="table table-hover" style="border-left: 1px solid #dddddd;border-right: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-collapse: separate;-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;">
	    <tbody>
	      <tr class="info">
            <td style="width:55%"><strong>文件名</strong></td>
            <td width =13% style="text-align:center"><strong>上传人</strong></td>
			<td width =13% style="text-align:center"><strong>日期</strong></td>
			<td width =13% style="text-align:center"><strong>下载次数</strong></td>
			<td width =13%></td>
          </tr>
		  <?php foreach($data as $key => $value) { ?>
			<tr>
			  <td><?=$data[$key]->filename_see?></td>
              <td style="text-align:center"><?=$data[$key]->name?></td>
			  <td style="text-align:center"><?=$data[$key]->uploaddate?></td>
			  <td style="text-align:center"><?=$data[$key]->downcount?></td>
			  <td>
			    <a href="#myModal<?=$key?>" data-toggle="modal"><i class="icon-download-alt"></i></a>
				<div id="myModal<?=$key?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
						<a href="<?=site_url()?>slide/download/<?=$data[$key]->filename?>" role="button" class="btn btn-primary">下载</a>
					</div>
				</div>
			  
			  
			  
			  </td>
			</tr>
		  <?php } ?>
	    </tbody>
	  </table>
	  
	  
	  
	  </div> <!-- main content -->
    </div> <!-- row-fluid -->
  </div> <!-- content -->
