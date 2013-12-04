  <div id="content" class="main box container-fluid">
    <div class="row-fluid">
      <div id="sidecontent" class="span3">
        <div id="sidebar">
          <ul class="nav nav-list">
            <li class="nav-header">导航</li>
            <li><a href="<?=site_url()?>intro.html">课程介绍</a></li>
            <li class="active"><a href="<?=site_url()?>outline.html">课程大纲</a></li>
            <li><a href="<?=site_url()?>tinfo.html">教师介绍</a></li>
            <li class="divider"></li>
            <li><a href="<?=site_url()?>account.html">学生账号管理</a></li>
            <li><a href="<?=site_url()?>group.html">学生分组</a></li>            
            <li class="divider"></li>
            <li><a href="<?=site_url()?>slide.html">课件上传</a></li>
            <li><a href="<?=site_url()?>resource.html">资料上传</a></li>
            <li><a href="<?=site_url()?>share.html">共享资料管理</a></li>
            <li class="divider"></li>
            <li><a href="<?=site_url()?>notice.html">消息发布</a></li>
            <li><a href="<?=site_url()?>assignment.html">作业管理</a></li>
            <li><a href="<?=site_url()?>forum.html">课程讨论区</a></li>
          </ul>
        </div> <!-- sidebar -->
      </div> <!-- sidecontent -->

      <div id="maincontent" class="span9">
        <?php $data = $this->outline_model->get_data();?>
        <div><h3>一、教学目标</h3></div>
        <textarea id="target" name="target" style="width:100%;height:10px;"><?=$data->target?></textarea>
        <hr>
        <div><h3>二、课程要求</h3></div>
        <textarea id="requirement" name="requirement" style="width:100%;height:10px;"><?=$data->requirement?></textarea>
        <hr>
        <div><h3>三、教学与实践安排</h3></div>
        <textarea id="arrangement" name="arrangement" style="width:100%;height:10px;"><?=$data->arrangement?></textarea>
        <hr>
        <div><h3>四、参考教材及相关资料</h3></div>
        <textarea id="recommendation" name="recommendation" style="width:100%;height:10px;"><?=$data->recommendation?></textarea>
        <hr>
        <div class="span2 offset9">
          <button type="submit" class="btn btn-large btn-primary btn-block">提交</button>
        </div>
      </div> <!-- main content -->
    </div> <!-- row-fluid -->
  </div> <!-- content -->

<script type="text/javascript">
  var ue1 = UM.getEditor('target');
  var ue2 = UM.getEditor('requirement');
  var ue3 = UM.getEditor('arrangement');
  var ue3 = UM.getEditor('recommendation');
</script>