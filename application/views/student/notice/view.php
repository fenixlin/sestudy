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
            <li class="active"><a href="<?=site_url()?>notice.html">课程通知</a></li>
            <li><a href="<?=site_url()?>slide.html">课件下载</a></li>
            <li><a href="<?=site_url()?>resource.html">资料下载</a></li>
            <li><a href="<?=site_url()?>share.html">共享资料</a></li>
            <li><a href="<?=site_url()?>assignment.html">作业提交</a></li>
            <li><a href="<?=site_url()?>forum.html">课程讨论区</a></li>
          </ul>
        </div> <!-- sidebar -->
      </div> <!-- sidecontent -->

      <div id="maincontent" class="span9">

      <a class="btn btn-primary" href="<?=site_url()?>notice/edit/<?=$nid?>.html"><i class="icon-edit icon-white"></i> 编辑</a>
      <a class="btn btn-danger" href="<?=site_url()?>notice/delete/<?=$nid?>.html"><i class="icon-remove icon-white"></i> 删除</a>
      <a class="btn" href="<?=site_url()?>notice.html"><i class="icon-arrow-left"></i> 返回</a>
      <br><br>

      <h3 class="text-center"><?=$title?></h3>
      <p class="span2 offset3">作者：<?=$username?></p>
      <p class="span3 offset2">发布时间：<?=$date?></p>
      <br><hr>
      <?=$detail?>
        
      </div> <!-- main content -->
    </div> <!-- row-fluid -->
  </div> <!-- content -->
