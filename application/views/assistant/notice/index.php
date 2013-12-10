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

        <h3>最新通知：</h3> 
        <form class="form-search" method="post" action="<?=site_url()?>notice/search.html">
          <table>
            <tr>
              <td width="84%">
                <div class="input-append">
                  <input type="text" id="search" name="search" class="input-large search-query" placeholder="标题关键字">
                  <input type="submit" class="btn btn-info" value="搜索">
                </div>
              </td>
              <td>                
                <div>
                  <a class="btn btn-primary" href="<?=site_url()?>notice/create.html">新建</a>
                  <a class="btn" href="<?=site_url()?>notice/allnotice.html">更多</a>
                </div>
              </td>
            </tr>
          </table>
        </form>
        <hr>

        <table class="table table-hover" style="border-left: 1px solid #dddddd;border-right: 1px solid #dddddd;border-bottom: 1px solid #dddddd;border-collapse: separate;-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;">
        
        <?php $i = 1; ?>
        <?php foreach ($results->result() as $row): ?>

        <?php if ($i % 2 == 1): ?>
          <tr class="info">
        <?php endif; ?>
        <?php if ($i % 2 == 0): ?>
          <tr>
        <?php endif; ?>
        
            <td width="13%">&nbsp;&nbsp;[<?=$row->username?>]</td>
            <td width="65%">
              <a href="<?=site_url()?>notice/view/<?=$row->nid?>.html"><?=$this->notice_model->get_title($row->title)?></a>
            </td>
            <td width="13%"><?=$row->date?></td>
            <td>
              <a href="<?=site_url()?>notice/edit/<?=$row->nid?>.html"><i class="icon-edit"></i></a>&nbsp;&nbsp;
              <a href="javascript:HandleOnClose('<?=site_url()?>notice/delete/<?=$row->nid?>.html')"><i class="icon-remove"></i></a>
            </td>
          </tr>

        <?php $i++; ?>
        <?php endforeach; ?><!-- the end of the foreach cycle -->

        </table><!-- the notice table -->
        
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
