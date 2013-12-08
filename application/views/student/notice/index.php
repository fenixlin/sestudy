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
        </div> <!-- sidebar -->
      </div> <!-- sidecontent -->

      <div id="maincontent" class="span9">
        <?php $rows = $this->notice_model->get_course_data(); ?>

        <table>
          <tr>
            <td width="92%"><h3>课程消息：</h3></td>  
            <td>
              <button class="btn btn-primary" type="button">更多</button>
            </td>
          </tr>
        </table><!-- the title -->
        <hr>

        <table class="table table-hover ">
          <?php for($i=0; $i<5; $i++): ?>

            <?php 
            if ($i == 0) {
              $row1 = $rows->first_row();
            }
            else 
            {
              $row1 = $rows->next_row();
            }
            $row2 = $rows->next_row();
            ?>

            <tr class="info">
              <td width="13%">[<?=$row1->username?>]</td>
              <td width="65%">
                <a href="<?=site_url()?>notice/view/<?=$row1->nid?>.html"><?=$this->notice_model->get_title($row1->title)?></a>
              </td>
              <td width="13%"><?=$row1->date?></td>
            </tr>
            <tr>
              <td width="13%">[<?=$row2->username?>]</td>
              <td width="65%">
                <a href="<?=site_url()?>notice/view/<?=$row2->nid?>.html"><?=$this->notice_model->get_title($row2->title)?></a>
              </td>
              <td width="13%"><?=$row2->date?></td>
            </tr>

          <?php endfor ?><!-- the end of the for cycle -->
        </table><!-- the news table -->
        
      </div> <!-- main content -->
    </div> <!-- row-fluid -->
  </div> <!-- content -->
