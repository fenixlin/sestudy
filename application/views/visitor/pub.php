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
			  <td></td>
            </tr>
			<?php foreach($data as $key => $value) { ?>
			<tr>
              <td><?=$data[$key]->filename_see?></td>
              <td><?=$data[$key]->userid?></td>
			  <td><?=$data[$key]->uploaddate?></td>
			  <td><?=$data[$key]->downcount?></td>
			  <td>
			  <a href="<?=site_url()?>pub/download/<?=$data[$key]->filename?>"><i class="icon-download-alt"></i></a>
			  </td>
            </tr>
			<?php } ?>
          </tbody>
        </table>
      </div> <!-- main content -->
    </div> <!-- row-fluid -->
  </div> <!-- content -->