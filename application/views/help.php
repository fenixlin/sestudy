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
              <li><a href="<?=site_url()?>all_teacher.html">教师队伍</a></li>
              <li><a href="<?=site_url()?>links.html">友情链接</a></li>
              <li class="active"><a href="<?=site_url()?>help.html">帮助</a></li>
            </ul>
          </li>
        </ul>
      </div> <!-- topnav -->
      <br class="clear" />
    </div> <!-- topbar -->
  </div> <!-- topnavbar -->

  <div id="content" class="main box container-fluid">
    <div class="row-fluid">
      <div id="leftcontent" class="span9">
        <legend><strong><h3>用户指南</h3></strong></legend>
        <ul>
          <li><h4>本站作用</h4></li>
          <p>需求分析和项目管理是现代软件工程中至关重要的两个环节。做好这两方面可以在开发周期早期改进项目需求的质量，可以减少返工和提高生产率。通过控制范围扩大和需求变更来满足项目的进度目标。达到更高的客户满意度。降低维护成本和技术支持成本。为了教学的需要以及锻炼学生的实际动手能力，课程组提供了实践性的项目供学生体验。学生们可以在开发的过程中切身体会到需求分析和项目管理理论上的指导作用，加强学习效果。并能学习到多种开发工具的使用，文档编写的规范等实际能力。</p>
          <p>该网站项目也对教学便利性有积极的推动作用，一直以来师生在课堂外的交流互动都是大问题，但信息时代的到来解决了这一难题。通过在线教学辅助系统能大大促进师生间的联系，让学生的疑问得到解答，也让老师能补充课堂上未能覆盖到的内容。</p>
          <li><h4>功能介绍</h4></li>
          <p>浙江大学软件工程系列课程教学网站主要针对教师、学生与游客开放，网站主要功能如下：登录、课程公告、课程介绍、课程大纲、教师介绍、资料共享、作业管理、课程讨论。</p>
          <ul>
            <li><h4>登录</h4></li>
            <p>在系统内注册的用户可以选择自己的身份登录。提供找回密码和记住登录账户功能，登录到系统后可以注销本次登录。</p>
            <li><h4>课程公告</h4></li>
            <p>管理员能在自己的后台系统中发布课程公告，其他用户能在登录进系统的首页看到自己选择课程的公告。</p>
            <li><h4>课程介绍</h4></li>
            <p>每门课都有课程介绍页面，管理员可以发布、修改课程的介绍，供其他用户浏览。</p>
            <li><h4>课程大纲</h4></li>
            <p>每门课的课程大纲都会发布到系统中，供相关用户获取。</p>
            <li><h4>教师介绍</h4></li>
            <p>每门课任课教师的相关资料都发布到了网站中，有权限的用户均可访问，管理员能够修改。</p>
            <li><h4>资料共享</h4></li>
            <p>教师和助教能够上传与课程相关的资料，供注册学生学习使用。</p>
            <li><h4>作业管理</h4></li>
            <p>教师发布作业，助教批改作业并打分，学生提交作业都在本系统中实现。</p>
            <li><h4>课程讨论</h4></li>
            <p>学生对课程有疑问均可在本系统中的课程讨论板块中提问，教师和助教会进行解答。</p>
          </ul>
        </ul>
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