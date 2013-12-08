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
        <?php $rows = $this->notice_model->get_course_data(); ?>

        <table>
          <tr>
            <td width="84%"><h3>课程消息：</h3></td>  
            <td>
              <a class="btn btn-primary" href="<?=site_url()?>notice/create.html">新建</a>
              <button class="btn" type="button">更多</button>
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
              <td>
                <a href="<?=site_url()?>notice/edit/<?=$row1->nid?>.html"><i class="icon-edit"></i></a>
                <a href="<?=site_url()?>notice/delete/<?=$row1->nid?>.html" style="margin-left:10px;"><i class="icon-remove"></i></a>
              </td>
            </tr>
            <tr>
              <td width="13%">[<?=$row2->username?>]</td>
              <td width="65%">
                <a href="<?=site_url()?>notice/view/<?=$row2->nid?>.html"><?=$this->notice_model->get_title($row2->title)?></a>
              </td>
              <td width="13%"><?=$row2->date?></td>
              <td>
                  <a href="<?=site_url()?>notice/edit/<?=$row2->nid?>.html"><i class="icon-edit"></i></a>
                  <a href="<?=site_url()?>notice/delete/<?=$row2->nid?>.html" style="margin-left:10px;"><i class="icon-remove"></i></a>
              </td>
            </tr>

          <?php endfor ?><!-- the end of the for cycle -->
        </table><!-- the news table -->
        
      </div> <!-- main content -->
    </div> <!-- row-fluid -->
  </div> <!-- content -->
