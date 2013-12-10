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
            <li><a href="<?=site_url()?>slide.html">课件上传</a></li>
            <li><a href="<?=site_url()?>resource.html">资料上传</a></li>
            <li><a href="<?=site_url()?>share.html">共享资料管理</a></li>
            <li class="divider"></li>
            <li class="active"><a href="<?=site_url()?>notice.html">消息发布</a></li>
            <li><a href="<?=site_url()?>assignment.html">作业管理</a></li>
            <li><a href="<?=site_url()?>forum.html">课程讨论区</a></li>
          </ul>
        </div> <!-- sidebar -->
      </div> <!-- sidecontent -->

      <div id="maincontent" class="span9">

      <a class="btn btn-primary" href="<?=site_url()?>notice/edit/<?=$nid?>.html"><i class="icon-edit icon-white"></i> 编辑</a>
      <a class="btn btn-danger" href="javascript:HandleOnClose('<?=site_url()?>notice/delete/<?=$nid?>.html')"><i class="icon-remove icon-white"></i> 删除</a>
      <a class="btn" href="javascript:history.go(-1);"><i class="icon-arrow-left"></i> 返回</a>
      <br><br>

      <h3 class="text-center"><?=$title?></h3>
      <p class="span2 offset3">作者：<?=$username?></p>
      <p class="span3 offset2">发布时间：<?=$date?></p>
      <br><hr>
      <?=$detail?>
        
      </div> <!-- main content -->
    </div> <!-- row-fluid -->
  </div> <!-- content -->

<script language="JavaScript" type="text/JavaScript">
function HandleOnClose(url) {
  var close = confirm("确认删除此消息？");
  if ( close) {
    window.open(url, '_self');
  }
  else
  {
    window.event;
  }
}
</script>