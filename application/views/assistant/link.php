<div id="content" class="main box container-fluid">
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
	
    </div> <!-- row-fluid -->
  </div> <!-- content -->
  