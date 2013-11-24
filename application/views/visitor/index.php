<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>resource/css/index.css" />
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>resource/css/main.css" />
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>resource/css/bootstrap.min.css" />
  <script type="text/javascript" href="<?=base_url()?>resource/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery.js?>"></script>
  <title>软件工程学习网</title>
</head>

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
          <li class="active"><a href="main.html">首页</a></li>
          <li><a href="course_sre.html">需求分析与设计</a></li>
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

  <div id="content" class="main box container-fluid">
    <div class="row-fluid">
      <div id="leftcontent" class="span9">
        通知通知通知通知通知通知通知通知通知通知通知通知通知通知通知通知通知通知通知通知通知通知通知通知通知通知通知通知通知通知通知通知通知通知通知通知通知&nbsp;
      </div> <!-- left content -->

      <div id="rightcontent" class="span3">
        <div id="loginbox">
          <h4>课程介绍</h4>
        </div>
        <div id="loginbox">
          <h4>友情链接</h4>
        </div>
      </div> <!-- right content -->
    </div>
  </div> <!-- content -->
	
  <div id="footer">
  	<div class="main box">
      <p class="f-right t-right">Author: <a href="aboutus.html" target="_blank">PRD第一小组</a>
      <br />Date : <a href="#" target="_blank">2013年11月</a></p>
      <p class="f-left">Copyright &copy;&nbsp;2013 <a href="http://cspo.zju.edu.cn/">浙江大学计算机与软件学院</a></p>
    </div> <!-- /main box -->
  </div> <!-- /footer -->

</body>
</html>
