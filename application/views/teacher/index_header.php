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
          <li class="active"><a href="<?=site_url()?>main.html">首页</a></li>
          <li><a href="<?=site_url()?>course/index/1">需求分析与设计</a></li>
          <li><a href="<?=site_url()?>course/index/2">项目管理与案例分析</a></li>
          <li><a href="<?=site_url()?>course/index/3">质量保证与测试</a></li>
          <li><a href="<?=site_url()?>public.html">公共资源</a></li>
          <li><a href="<?=site_url()?>board.html">留言板</a></li>
          <li class="last"><a href="#">其他</a>
            <ul>
              <li><a href="<?=site_url()?>all_teacher.html">教师队伍</a></li>
              <li><a href="<?=site_url()?>links.html">友情链接</a></li>
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

