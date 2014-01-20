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
          <li><a href="<?=site_url()?>slide.html">课件管理</a></li>
          <li><a href="<?=site_url()?>upload.html">资料管理</a></li>
          <li><a href="<?=site_url()?>share.html">共享资源管理</a></li>
          <li class="divider"></li>
          <li><a href="<?=site_url()?>notice.html">消息发布</a></li>
          <li class="active"><a href="<?=site_url()?>assignment.html">作业管理</a></li>
          <li><a href="<?=site_url()?>forum.html">课程讨论区</a></li>
        </ul>
      </div> <!-- sidebar -->
    </div> <!-- sidecontent -->

    <div id="maincontent" class="span9">
      <legend><strong>上交作业</strong></legend>

      <?php echo form_open('assignment/uploadhomework');?>
      <div><h3>姓名</h3></div>
      <input type="text" id="name" name="name">
      <input type="submit" class="btn btn-primary" style="float:right;" value="上传作业">
      <a class="btn" href="javascript:history.back(-1)" style="float:right;">返回</a>
    </form>
  </div> <!-- main content -->
</div> <!-- row-fluid -->
</div> <!-- content -->