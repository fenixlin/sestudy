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
                <a href="<?=site_url()?>backstage/mainpage.html">后台信息</a>
            	</li>
            	<li class="active">
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
          	<a type="button" href="<?=site_url()?>main.html" style="float:right; display:block; padding:10px 20px 10px;">管理员登出</a>
          </div>
        </div>
      </div>
    </div>

  <div class="container">
  	<div style="margin:0 auto 20px; padding:40px 60px 40px; min-height:400px; background-color:#fff; border: 1px solid #c5c5c5; -webkit-border-radius:10px; border-radius: 10px; -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.1); box-shadow:0 1px 2px rgba(0,0,0,.1);">
    	<legend><strong>所有教师列表</strong><button class="btn-primary" style="float:right;">添加教师</button></legend>
    	<table class="table table-hover">
        <tbody>
          <tr class="info">
            <td style="width:15%">
              id
            </td>
            <td style="width:25%">
              姓名
            </td>
            <td style="width:25%">
              邮箱
            </td>
            <td style="width:25%">
              联系电话
            </td>
            <td>
              
            </td>
          </tr>
          <tr>
            <td style="width:15%">
              1
            </td>
            <td style="width:25%">
              测试员1
            </td>
            <td style="width:25%">
              test1@a.com
            </td>
            <td style="width:25%">
              13747913874
            </td>              
            <td>
              <i class="icon-edit"></i>
              <i class="icon-remove"></i>
            </td>
          </tr>
          <tr class="info">
            <td style="width:15%">
              2
            </td>
            <td style="width:25%">
              测试员2
            </td>
            <td style="width:25%">
              test2@a.com
            </td>
            <td style="width:25%">
              1874728937
            </td>              
            <td>
              <i class="icon-edit"></i>
              <i class="icon-remove"></i>
            </td>
          </tr>
        </tbody>        
      </table>
  	</div>
	</body>

</html>
