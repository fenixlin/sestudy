<div id="content" class="main box container-fluid">
    <div class="row-fluid">
	
	<div id="leftcontent" class="span9">
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
  