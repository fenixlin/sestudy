  <div id="content" class="main box container-fluid">
    <div class="row-fluid">
      <div id="leftcontent" class="span9">

        <a class="btn" href="<?=site_url()?>main.html"><i class="icon-arrow-left"></i> 返回</a>
        <br><br>

        <h3 class="text-center"><?=$title?></h3>
        <p class="span2 offset3">作者：<?=$username?></p>
        <p class="span3 offset2">发布时间：<?=$date?></p>
        <br><hr>
        <?=$detail?>
        
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
