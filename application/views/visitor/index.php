  <div id="content" class="main box container-fluid">
    <div class="row-fluid">
      <div id="leftcontent" class="span9">

        <table>
          <tr>
            <td width="650px"><h3>最新公告：</h3></td>  
            <td>
              <button class="btn btn-primary" type="button">更多</button>
            </td>
          </tr>
        </table><!-- the title -->
        <hr>

        <?php $rows = $this->notice_model->get_home_data(); ?>

        <table class="table table-hover">
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
              <td width="8%"><?=$this->notice_model->get_course($row1->course)?></td>
              <td width="13%">[<?=$row1->username?>]</td>
              <td width="63%">
                <a href="<?=site_url()?>main/news/<?=$row1->nid?>.html"><?=$this->notice_model->get_title($row1->title)?></a>
              </td>
              <td width="16%"><?=$row1->date?></td>
            </tr>
            <tr>
              <td width="8%"><?=$this->notice_model->get_course($row2->course)?></td>
              <td width="10%">[<?=$row2->username?>]</td>
              <td width="66%">
                <a href="<?=site_url()?>main/news/<?=$row2->nid?>.html"><?=$this->notice_model->get_title($row2->title)?></a>
              </td>
              <td width="16%"><?=$row2->date?></td>
            </tr>

          <?php endfor ?><!-- the end of the for cycle -->
        </table><!-- the news table -->
        
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
    </div>
  </div> <!-- content -->
