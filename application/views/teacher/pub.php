  <div id="content" class="main box container-fluid">
      <div id="maincontent" class="span9">
	   <?php $data = $this->recourse_model->pub_downtable();?>
	   <?php $i = 1; ?>
       <table class="table table-hover" style="border-left: 1px solid #dddddd;border-right: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-collapse: separate;-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;">
          <tbody>
            <tr class="info">
              <td style="width:60%"><strong>文件名</strong></td>
              <td width =13%><strong>上传人</strong></td>
			  <td width =13%><strong>日期</strong></td>
			  <td width =13%><strong>下载次数</strong></td>
			  <?php //echo $this->session->userdata('name');?>
			  <td></td>
            </tr>
			<?php foreach($data as $key => $value) { ?>
			<tr>
              <td><?=$data[$key]->filename_see?></td>
              <td><?=$data[$key]->name?></td>
			  <td><?=$data[$key]->uploaddate?></td>
			  <td><?=$data[$key]->downcount?></td>
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
						<a href="<?=site_url()?>pub/download/<?=$data[$key]->filename?>" role="button" class="btn btn-primary">下载</a>
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
  
  