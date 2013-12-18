<body>

  <div id="header" class="main box">
    <h1 id="logo">Software&nbsp;<span>Engineering</span></h1>
    <ul id="header_nav">
      <li><a href="<?=site_url()?>help.html">帮助</a></li>
      <span>|</span>
      <li><a href="<?=site_url()?>login.html">登陆</a></li>
    </ul> <!-- header_nav -->
  </div> <!-- header -->

  <?php $course=$this->session->userdata('course'); ?>
  <div id="topnavbar">
    <div id="topbar">
      <div id="topnav">
        <ul>
          <li><a href="<?=site_url()?>main.html">首页</a></li>
          <li <?php if ($course==1) echo "class=\"active\""?>><a href="<?=site_url()?>course/index/1">需求分析与设计</a></li>
          <li <?php if ($course==2) echo "class=\"active\""?>><a href="<?=site_url()?>course/index/2">项目管理与案例分析</a></li>
          <li <?php if ($course==3) echo "class=\"active\""?>><a href="<?=site_url()?>course/index/3">质量保证与测试</a></li>
          <li><a href="<?=site_url()?>pub.html">公共资源</a></li>
          <li><a href="<?=site_url()?>board.html">留言板</a></li>
          <li class="last"><a href="#">其他</a>
            <ul>
              <li><a href="<?=site_url()?>all_teacher.html">教师队伍</a></li>
              <li><a href="<?=site_url()?>links.html">友情链接</a></li>
            </ul>
          </li>
        </ul>
      </div> <!-- topnav -->
      <br class="clear" />
    </div> <!-- topbar -->
  </div> <!-- topnavbar -->

