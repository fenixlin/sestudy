<body>  
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
                <a href="<?=site_url()?>backstage/assistants.html">助教账户管理</a>
                </li>
            	<li>
                <a href="<?=site_url()?>backstage/students.html">学生账户管理</a>
            	</li>
            	<li>
                <a href="<?=site_url()?>backstage/courses.html">课程班级管理</a>
            	</li>
        		</ul>
          	<a class="reversed" type="button" href="<?=site_url()?>main.html" style="float:right; display:block; padding:10px 20px 10px;">返回网站</a>
          </div>
        </div>
      </div>
    </div>

  <div class="container">
  	<div id="internal_container">
    	<legend><strong>欢迎进入管理后台！</strong></legend>
    	<p>目前系统版本：Beta v 1.0</p>         
        <p>如有疑问，请随时联系维护人员：<a href="mailto: fenixl@163.com">fenixl@163.com</a></p>
  	</div>
	</body>

</html>
