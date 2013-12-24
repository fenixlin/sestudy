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
    	<legend>
        <strong>添加教学班级</strong>
        <a class="btn" style="float:right;" href="<?=site_url()?>backstage/courses.html">返回</a>
      </legend>
        <?php 
          $attr = array('class'=>'form-horizontal');
          echo form_open('backstage/classes_new',$attr);
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
    	    <div class="control-group">
            <label class="control-label" for="term">学期&nbsp;:</label>
            <div class="controls">
              <input class="input-xlarge" type="text" id="term" name="term" value="">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="time">上课时段&nbsp;:</label>
            <div class="controls">
              <input class="input-xlarge" type="text" id="time" name="time" value="">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="major">面向专业&nbsp;:</label>
            <div class="controls">
              <input class="input-xlarge" type="text" id="major" name="major" value="">
            </div>
          </div>      
          <div class="control-group">
            <label class="control-label" for="course">所属课程(*)&nbsp;:</label>
            <div class="controls">
            <table class="table table-hover wrapped">
              <tbody>
                <tr class="info">
                  <td style="width:5%">
                    &nbsp;
                  </td>
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

                    echo "<td><input type=\"radio\" name=\"course\" value=\"".$row->courseid."\" /></td>";
                    echo "<td>".$row->courseid."</td>";
                    echo "<td>".$row->name."</td>";              

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
            <label class="control-label" for="class">任课教师&nbsp;:</label>
            <div class="controls">
              <table class="table table-hover wrapped">
                <tbody>
                  <tr class="info">
                    <td style="width:5%">
                      <strong>&nbsp;</strong>
                    </td>
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
                  </tr>
                  <?php
                    $query = $this->backstage_model->get_teacher_list();
                    $flag = FALSE;
                    foreach ($query->result() as $row)
                    {
                      echo "<tr";
                      if ($flag) echo " class=\"info\"";
                      echo ">";

                      echo "<td><input type=\"checkbox\" name=\"teacher[]\" value=\"".$row->userid."\"></td>";
                      echo "<td>".$row->userid."</td>";
                      echo "<td>".$row->name."</td>";
                      echo "<td>".$row->major."</td>";
                      echo "<td>".$row->email."</td>";
                      echo "<td>".$row->tel."</td>";                    

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
