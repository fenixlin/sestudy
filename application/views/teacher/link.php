<div id="content" class="main box container-fluid">
    <div class="row-fluid">
	
	<div id="leftcontent" class="span9">
	
	<a href="#myModal" role="button" class="btn btn-primary btn-lg" data-toggle="modal">添加友情链接</a>
		<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel">添加友情链接</h3>
			</div>
			
			<form action="/sestudy/index.php/links/add" method="post" enctype="multipart/form-data">
			
			<div class="modal-body">
				<div class="form-group">
					<input type="text" class="form-control" id="name" name="name" placeholder="网站名称">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="url" name="url" placeholder="网址">
				</div>
			
				<textarea id="information" name="information" placeholder="简介"></textarea>
			</div>
			
			<div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
				<input type="submit" class="btn btn-primary" name="sub" value="提交" />
			</div>
			</form>
		</div>
		
		<br><br>
		
		<table class="table table-hover" style="border-left: 1px solid #dddddd;border-right: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-collapse: separate;-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;">
		<tbody>
			<?php $data = $this->link_model->show();?>
			<?php //var_dump($data); ?>
			<?php $i = 1; ?>
			<?php foreach($data as $key => $value) { ?>
			<tr <?php if($i == 1)  echo 'class="info"'?>>
				<td><?=$data[$key]->name?> </td>
				<td><a href="<?=$data[$key]->url?>" target="_blank"><?=$data[$key]->url?></a></td>
				<td><?=$data[$key]->information?> </td>
				<td><a href="javascript:HandleOnClose('<?=site_url()?>links/delete_link/<?=$data[$key]->linkid?>')"><i class="icon-remove"></i></a></td>
			</tr>
			<?php $i = $i % 2 + 1; ?>
			<?php } ?>

		</tbody>
		</table>
	
	</div> <!-- left content -->
	
	<div id="rightcontent" class="span3">
        <div id="loginbox">
          <h4>课程介绍</h4>
          本网站包括三门课程：<br>
          1.软件需求分析与设计<br>
          2.项目管理与案例分析M<br>
          3.质量保证与测试<br><br>
        </div>
        <div id="loginbox" class="text-center">
          <h4 class="text-left">友情链接</h4>
          <a href="http://zupo.zju.edu.cn/" target="_blank"><img src="<?=base_url()?>resource/img/zupologo.jpg"/></a><br><br>
          <a href="http://www.cs.zju.edu.cn/" target="_blank"><img src="<?=base_url()?>resource/img/cslogo.jpg"/></a><br><br>
          <a href="http://ugrs.zju.edu.cn/" target="_blank"><img src="<?=base_url()?>resource/img/ugrslogo.jpg"/></a><br><br>
          <a href="http://www.cc98.org/" target="_blank"><img src="<?=base_url()?>resource/img/cc98logo.jpg"/></a><br><br>
        </div>
      </div> <!-- right content -->
	
    </div> <!-- row-fluid -->
  </div> <!-- content -->
  
  
   <script language="JavaScript" type="text/JavaScript">
function HandleOnClose(url) {
  var close = confirm("确认删除该链接？");
  if ( close) {
    window.open(url, '_self');
  }
  else
  {
    window.event;
  }
}
</script>