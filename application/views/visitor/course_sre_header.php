<body>

  <div id="header" class="main box">
    <h1 id="logo">Software&nbsp;<span>Engineering</span></h1>
    <ul id="header_nav">
      <li><a href="help.html">帮助</a></li>
      <span>|</span>
      <li><a href="login.html">登陆</a></li>
    </ul> <!-- header_nav -->
  </div> <!-- header -->

  <div id="topnavbar">
    <div id="topbar">
      <div id="topnav">
        <ul>
          <li><a href="main.html">首页</a></li>
          <li class="active"><a href="course_sre.html">需求分析与设计</a></li>
          <li><a href="course_pm.html">项目管理与案例分析</a></li>
          <li><a href="course_qa.html">质量保证与测试</a></li>
          <li><a href="resource.html">公共资源</a></li>
          <li><a href="board.html">留言板</a></li>
          <li class="last"><a href="#">其他</a>
            <ul>
              <li><a href="teacher.html">教师队伍</a></li>
              <li><a href="links.html">友情链接</a></li>
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

