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
            	<li class="active">
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
    	<legend>
        <strong>修改学生账户</strong>
        <a class="btn" style="float:right;" href="<?=site_url()?>backstage/students.html">返回</a>
      </legend>
        <?php 
          $attr = array('class'=>'form-horizontal');
          echo form_open('backstage/students_edit/'.$userid,$attr);
        ?> 
          <?php
            $message = validation_errors();
            $message2 = $this->session->flashdata('message');
            if ($message != "" || $message2 != "")
            {
              echo "<div class=\"alert alert-error\">";
              echo $message;
              echo $message2;
              echo "</div>";
            }
          ?>
          <?php $userinfo = $this->backstage_model->get_student_info($userid); ?>
    	    <div class="control-group">
            <label class="control-label" for="username">用户名(*)&nbsp;:</label>
            <div class="controls">
              <input class="input-xlarge" type="text" id="username" name="username" value="<?=$userid?>" readonly>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="name">姓名&nbsp;:</label>
            <div class="controls">
              <input class="input-xlarge" type="text" id="name" name="name" value="<?=$userinfo->name?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="major">所属学院与专业&nbsp;:</label>
            <div class="controls">
              <input class="input-xlarge" type="text" id="major" name="major" value="<?=$userinfo->major?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="email">邮箱&nbsp;:</label>
            <div class="controls">
              <input class="input-xlarge" type="text" id="email" name="email" value="<?=$userinfo->email?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="tel">联系电话&nbsp;:</label>
            <div class="controls">
              <input class="input-xlarge" type="text" id="tel" name="tel" value="<?=$userinfo->tel?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="tel">所属班级&nbsp;:</label>
            <div class="controls">
              <table class="table table-hover wrapped">
                <tbody>
                  <tr class="info">
                    <td>
                      <strong>&nbsp;</strong>
                    </td>
                    <td style="width:5%">
                      <strong>ID</strong>
                    </td>
                    <td style="width:18%">
                      <strong>学期</strong>
                    </td>
                    <td style="width:18%">
                      <strong>课程</strong>
                    </td>
                    <td style="width:25%">
                      <strong>上课时间</strong>
                    </td>
                    <td style="width:20%">
                      <strong>面向专业</strong>
                    </td>
                    <td style="width:12%">
                      <strong>任课教师</strong>
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

                      echo "<td><input type=\"checkbox\" name=\"class[]\" value=\"".$row->classid."\"";
                      if ($this->backstage_model->is_taking($userid, $row->courseid, $row->classid)) echo "checked></td>";                     
                        else echo "></td>";

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
                      echo "</tr>";

                      if (!$flag) $flag = TRUE;
                        else $flag = FALSE;
                    }
                  ?>                
                </tbody>        
              </table>
            </div>
          </div>          
          <div class="control-group">            
            <div class="controls">
              <input type="submit" class="btn btn-primary" value="提交">
            </div>
          </div>
        </form> <!-- form-horizontal -->
  	</div>
  </div>
</body>

</html>
