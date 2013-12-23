<body>  
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
            	<li class="active">
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
    	<legend><strong>所有助教列表</strong><button class="btn btn-primary" style="float:right;">添加教师</button></legend>
    	<table class="table table-hover wrapped">
        <tbody>
          <tr class="info">
            <td style="width:15%">
              <strong>ID</strong>
            </td>
            <td style="width:20%">
              <strong>姓名</strong>
            </td>
            <td style="width:20%">
              <strong>所属学院</strong>
            </td>
            <td style="width:20%">
              <strong>邮箱</strong>
            </td>
            <td style="width:20%">
              <strong>联系电话</strong>
            </td>
            <td>
              <strong>操作</strong>
            </td>
          </tr>
          <?php
            $query = $this->backstage_model->get_teacher_list();
            $flag = FALSE;
            foreach ($query->result() as $row)
            {
              echo "<tr";
              if ($flag) echo " class=\"info\"";
              echo ">";

              echo "<td>".$row->userid."</td>";
              echo "<td>".$row->name."</td>";
              echo "<td>".$row->major."</td>";
              echo "<td>".$row->email."</td>";
              echo "<td>".$row->tel."</td>";
              echo "<td><i class=\"icon-edit\"></i>&nbsp;<i class=\"icon-remove\"></i></td>";

              echo "</tr>";

              if (!$flag) $flag = TRUE;
                else $flag = FALSE;
            }
          ?>
          
        </tbody>        
      </table>
  	</div>
	</body>

</html>
