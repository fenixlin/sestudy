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
            	<li>
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
            	<li class="active">
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
    	<legend><strong>所有课程列表</strong></legend>
    	<table class="table table-hover">
        <tbody>
          <tr class="info">
            <td style="width:30%">
              id
            </td>
            <td>
              名称
            </td>  
          </tr>
          <tr>
            <td style="width:30%">
              1
            </td>
            <td>
              软件需求分析与设计
            </td>
          </tr>
          <tr class="info">
            <td style="width:30%">
              2
            </td>
            <td>
              项目管理与案例分析
            </td>
          </tr>
          <tr>
            <td style="width:30%">
              3
            </td>
            <td>
              软件测试与质量保证
            </td>
          </tr>
        </tbody>        
      </table>


      <legend><strong>所有班级列表</strong><button class="btn btn-primary" style="float:right;">添加班级</button></legend>
      <table class="table table-hover">
        <tbody>
          <tr class="info">
            <td style="width:10%">
              id
            </td>
            <td style="width:30%">
              课程
            </td>
            <td style="width:20%">
              时间
            </td>
            <td style="width:30%">
              任课老师
            </td>
            <td>
              <i class="icon-edit"></i>
              <i class="icon-remove"></i>
            </td>
          </tr>
          <tr>
            <td style="width:10%">
              1
            </td>
            <td style="width:30%">
              软件需求分析与设计
            </td>
            <td style="width:20%">
              周一上午3, 4, 5节
            </td>
            <td style="width:30%">
              邢卫，胡天磊
            </td>
            <td>
              <i class="icon-edit"></i>
              <i class="icon-remove"></i>
            </td>
          </tr>
          <tr class="info">
            <td style="width:10%">
              2
            </td>
            <td style="width:30%">
              软件需求分析与设计
            </td>
            <td style="width:20%">
              周一下午6, 7, 8节
            </td>
            <td style="width:30%">
              邢卫，刘玉生
            </td>
            <td>
              <i class="icon-edit"></i>
              <i class="icon-remove"></i>
            </td>
          </tr>
          <tr>
            <td style="width:10%">
              3
            </td>
            <td style="width:30%">
              项目管理与案例分析
            </td>
            <td style="width:20%">
              周五上午1, 2节
            </td>
            <td style="width:30%">
              金波
            </td>
            <td>
              <i class="icon-edit"></i>
              <i class="icon-remove"></i>
            </td>
          </tr>
          </tr>
        </tbody>        
      </table>

      <legend><strong>所有讨论区列表</strong><button class="btn btn-primary" style="float:right;">添加讨论区</button></legend>
      
  	</div>
	</body>

</html>
