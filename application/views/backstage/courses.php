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
            	<li>
                <a href="<?=site_url()?>backstage/assistants.html">助教账户管理</a>
                </li>
            	<li>
                <a href="<?=site_url()?>backstage/students.html">学生账户管理</a>
            	</li>
            	<li class="active">
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
    	<legend><strong>所有课程列表</strong></legend>
    	<table class="table table-hover wrapped">
        <tbody>
          <tr class="info">
            <td style="width:30%">
              <strong>ID</strong>
            </td>
            <td>
              <strong>名称</strong>
            </td>  
          </tr>
          <?php
            $query = $this->backstage_model->get_course_list();
            $flag = FALSE;
            foreach ($query->result() as $row)
            {
              echo "<tr";
              if ($flag) echo " class=\"info\"";
              echo ">";

              echo "<td>".$row->courseid."</td>";
              echo "<td>".$row->name."</td>";              

              echo "</tr>";

              if (!$flag) $flag = TRUE;
                else $flag = FALSE;
            }
          ?>
        </tbody>        
      </table>


      <legend><strong>所有班级列表</strong><a href="<?=site_url()?>backstage/classes_new.html" class="btn btn-primary" style="float:right;">添加班级</a></legend>
      <table class="table table-hover wrapped">
        <tbody>
          <tr class="info">
            <td style="width:5%">
              <strong>ID</strong>
            </td>
            <td style="width:15%">
              <strong>学期</strong>
            </td>
            <td style="width:15%">
              <strong>课程</strong>
            </td>
            <td style="width:25%">
              <strong>上课时间</strong>
            </td>
            <td style="width:20%">
              <strong>面向专业</strong>
            </td>
            <td style="width:15%">
              <strong>任课教师</strong>
            </td>
            <td>
              <strong>操作</strong>
            </td>
          </tr>
          <?php
            $query = $this->backstage_model->get_class_list();
            $flag = FALSE;
            foreach ($query->result() as $row)
            {
              echo "<tr";
              if ($flag) echo " class=\"info\"";
              echo ">";

              echo "<td>".$row->classid."</td>";
              echo "<td>".$row->term."</td>";              
              echo "<td>".$row->coursename."</td>";
              echo "<td>".$row->time."</td>";
              echo "<td>".$row->major."</td>";

              $tchlist = $this->backstage_model->get_class_teacher($row->courseid, $row->classid);              
              echo "<td>";
              foreach ($tchlist->result() as $tch)
              {
                echo $tch->name."&nbsp;";
              }
              echo "</td>";

              echo "<td><i class=\"icon-edit\"></i>&nbsp;<i class=\"icon-remove\"></i></td>";

              echo "</tr>";

              if (!$flag) $flag = TRUE;
                else $flag = FALSE;
            }
          ?>          
        </tbody>        
      </table>

      <legend><strong>所有讨论区列表</strong><a href="<?=site_url()?>backstage/forums_new.html" class="btn btn-primary" style="float:right;">添加讨论区</a></legend>      
      <?php
        $maxfid = (int)($this->backstage_model->get_max_forumid());
        for ($i = 1; $i <= $maxfid; $i++)
        {
          echo "<div class=\"title\"><span class=\"title\">讨论区".$i."包括班级：</span>";
          echo "<a href=\"".site_url()."backstage/forums_delete/".$i."\" class=\"btn\" style=\"float:right;\">删除讨论区".$i."</a></div>";
          echo "<table class=\"table table-hover wrapped\">
                  <tbody>
                    <tr class=\"info\">
                      <td style=\"width:5%\">
                        <strong>ID</strong>
                      </td>
                      <td style=\"width:15%\">
                        <strong>学期</strong>
                      </td>
                      <td style=\"width:15%\">
                        <strong>课程</strong>
                      </td>
                      <td style=\"width:25%\">
                        <strong>上课时间</strong>
                      </td>
                      <td style=\"width:20%\">
                        <strong>面向专业</strong>
                      </td>
                      <td style=\"width:15%\">
                        <strong>任课教师</strong>
                      </td>
                    </tr>";
          $forumlist = $this->backstage_model->get_forum_class_list($i);
          foreach ($forumlist->result() as $forum)
          {
            echo "<tr>";
            $query = $this->backstage_model->get_class_info($forum->classid);            
            $thisclass = $query->first_row();
            echo "<td>".$thisclass->classid."</td>";
            echo "<td>".$thisclass->term."</td>";
            echo "<td>".$thisclass->coursename."</td>";
            echo "<td>".$thisclass->time."</td>";
            echo "<td>".$thisclass->major."</td>";
            $tchlist = $this->backstage_model->get_class_teacher($thisclass->courseid, $thisclass->classid);
            echo "<td>";
            foreach ($tchlist->result() as $tch)
            {
              echo $tch->name."&nbsp;";
            }
            echo "</td>";
            echo "</tr>";
          }
          echo    "</tbody>        
                </table>";
        }
      ?>
  	</div>
  </div>
</body>

</html>
