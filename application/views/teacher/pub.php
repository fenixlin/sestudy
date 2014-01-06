  <div id="content" class="main box container-fluid">
      <div id="maincontent" class="span9">
	   <?php $data = $this->share_model->pub_downtable();?>
	   <?php $i = 1; ?>
       <table class="table table-hover" style="border-left: 1px solid #dddddd;border-right: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-collapse: separate;-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;">
          <tbody>
            <tr class="info">
              <td style="width:55%"><strong>文件名</strong></td>
              <td width =13% style="text-align:center"><strong>上传人</strong></td>
			  <td width =13% style="text-align:center"><strong>日期</strong></td>
			  <td width =13% style="text-align:center"><strong>下载次数</strong></td>
			  <?php //echo $this->session->userdata('name');?>
			  <td></td>
			  <td></td>
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
						<a href="<?=site_url()?>pub/download/<?=$data[$key]->filename?>" role="button" class="btn btn-primary">下载</a>
					</div>
				</div>
			  </td>
			  <td><a href="javascript:HandleOnClose('<?=site_url()?>pub/delete_share/<?=$data[$key]->filename?>')"><i class="icon-remove"></i></a></td>
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