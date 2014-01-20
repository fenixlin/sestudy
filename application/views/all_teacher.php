<body>

  <div id="header" class="main box">
    <h1 id="logo">Software&nbsp;<span>Engineering</span></h1>
    <ul id="header_nav">
      <li><a href="<?=site_url()?>backstage.html">后台</a></li>
      <span>|</span>      
      <li><a href="<?=site_url()?>prof.html">个人账户管理</a></li>
      <span>|</span>
      <li><a href="<?=site_url()?>logout.html">登出</a></li>
    </ul> <!-- header_nav -->
  </div> <!-- header -->

  <?php $course=$this->session->userdata('course'); ?>
  <div id="topnavbar">
    <div id="topbar">
      <div id="topnav">
        <ul>
          <li><a href="<?=site_url()?>main.html">首页</a></li>
          <li><a href="<?=site_url()?>course/index/1">需求分析与设计</a></li>
          <li><a href="<?=site_url()?>course/index/2">项目管理与案例分析</a></li>
          <li><a href="<?=site_url()?>course/index/3">质量保证与测试</a></li>
          <li><a href="<?=site_url()?>pub.html">公共资源</a></li>
          <li><a href="<?=site_url()?>board.html">留言板</a></li>
          <li class="last active"><a href="#">其他</a>
            <ul>
              <li class="active"><a href="<?=site_url()?>all_teacher.html">教师队伍</a></li>
              <li><a href="<?=site_url()?>links.html">友情链接</a></li>
              <li><a href="<?=site_url()?>help.html">帮助</a></li>
            </ul>
          </li>
        </ul>
      </div> <!-- topnav -->
      <div id="search">
        <?php echo form_open('search'); ?>
          <fieldset>
            <input type="text" value="Search Website&hellip;"  onfocus="this.value=(this.value=='Search Website&hellip;')? '' : this.value ;" />
            <input type="submit" name="go" id="go" value="搜索" />
          </fieldset>
        </form>
      </div> <!-- search -->
      <br class="clear" />
    </div> <!-- topbar -->
  </div> <!-- topnavbar -->

  <div id="content" class="main box container-fluid">
    <div class="row-fluid">
      <div id="leftcontent" class="span9">

        <h3>所有教师列表：</h3><hr>   
        
        <?php foreach ($results->result() as $row): ?>

        <div>
          <strong>姓名：</strong><br>
          <?=$row->name?><br>
          <strong>邮箱：</strong><br>
          <?=$row->email?><br>
          <strong>电话：</strong><br>
          <?=$row->tel?><br>
          <strong>研究方向：</strong><br>
          <?=$row->major?><br>
          <hr>
        </div>
          
        <?php endforeach; ?><!-- the end of the foreach cycle -->
        
      </div> <!-- left content -->

      <div id="rightcontent" class="span3">
        <div id="loginbox">
          <h4>课程介绍</h4>
          本网站包括三门课程：<br>
          1.软件需求分析与设计<br>
          2.项目管理与案例分析<br>
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