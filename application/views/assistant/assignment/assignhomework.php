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
        <div class="row-fluid">
         <legend><strong>发布作业</strong></legend>
       </div>
       <?php echo form_open('assign');?>
       <div><h3>题目</h3></div>
       <input class="input-block-level" type="text" id="title" name="title">
       <div><h3>要求</h3></div>
       <textarea style="width:100%;height:200px;" id="requirement" name="requirement"></textarea>
       <input type="submit" class="btn btn-primary" style="float:right;" value="发布">
       <a class="btn" href="javascript:history.back(-1)" style="float:right;">返回</a>
     </form>		
   </div> <!-- main content -->
 </div> <!-- row-fluid -->
  </div> <!-- content -->