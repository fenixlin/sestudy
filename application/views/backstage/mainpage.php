<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>resource/css/bootstrap.min.css" />
  <script type="text/javascript" src="http://code.jquery.com/jquery.js?>"></script>
  <script type="text/javascript" src="<?=base_url()?>resource/js/bootstrap.min.js"></script>  
  <title>软件工程学习网</title>
</head>

<body style="background-color:#e5e5e5; margin-top:80px; margin-bottom:80px">  
    <div class="navbar navbar-inverse navbar-fixed-top">
    	<div class="navbar-inner">
    		<div class="container">
        	<a class="brand" href="#"><b style="color:white;">管理后台</b></a>
        	<div class="nav-collapse collapse">
        		<ul class="nav">
            	<li class="active">
                <a href="<?=site_url()?>backstage">后台信息</a>
            	</li>
            	<li>
                <a href="<?=site_url()?>backstage/teachers.html">教师账户管理</a>
            	</li>
            	<li>
                <a href="#">助教账户管理</a>
                </li>
            	<li>
                <a href="#">学生账户管理</a>
            	</li>
            	<li>
                <a href="<?=site_url()?>backstage/courses.html">课程班级管理</a>
            	</li>
        		</ul>
          	<a type="button" href="<?=site_url()?>main.html" style="float:right; display:block; padding:10px 20px 10px;">返回网站</a>
          </div>
        </div>
      </div>
    </div>

  <div class="container">
  	<div style="margin:0 auto 20px; padding:40px 60px 40px; min-height:400px; background-color:#fff; border: 1px solid #c5c5c5; -webkit-border-radius:10px; border-radius: 10px; -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.1); box-shadow:0 1px 2px rgba(0,0,0,.1);">
    	<legend><strong>欢迎进入管理后台！</strong></legend>
    	<p>上次管理员登陆时间：2013-12-07 13:42:33</p>
    	<p>目前系统版本：v 0.8</p> 
  	</div>
	</body>

</html>
