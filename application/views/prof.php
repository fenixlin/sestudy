  <div id="content" class="main box container-fluid">
    <div class="row-fluid">
      <div id="leftcontent" class="span2">
        &nbsp;
      </div> <!-- left content -->

      <div id="rightcontent" class="span8">
        
        <?php $row = $this->prof_model->getProfile();?>

        <!--登录表单-->        
        <?php 
          $attr = array('class'=>'form-horizontal');
          echo form_open('prof',$attr);
        ?>
          <legend><b>账户信息管理</b></legend>
          <!--显示错误信息-->          
          <?php
            $error = validation_errors();
            if ($error!="" || $message!="")
            { 
              if ($success == FALSE)
              {
                echo "<div class=\"alert alert-error\">";  
                echo $error;  
                echo $message;              
                echo "</div>";
              }
              else
              {
                echo "<div class=\"alert alert-success\">";  
                echo $message;              
                echo "</div>";
              }
            }
          ?>
          <div class="control-group">
            <label class="control-label" for="username">用户名(*)&nbsp;:</label>
            <div class="controls">
              <input class="input-xlarge" type="text" id="username" name="username" value="<?=$this->session->userdata('userid')?>" disabled>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="password_old">旧密码(*)&nbsp;:</label>
            <div class="controls">
              <input class="input-xlarge" type="password" id="password_old" name="password_old">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="password_new">新密码&nbsp;:</label>
            <div class="controls">
              <input class="input-xlarge" type="password" id="password_new" name="password_new">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="password_newc">再次输入新密码&nbsp;:</label>
            <div class="controls">
              <input class="input-xlarge" type="password" id="password_newc" name="password_newc">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="question">密码找回问题&nbsp;:</label>
            <div class="controls">
              <input class="input-xlarge" type="text" id="question" name="question" value="<?=$row->ques?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="answer">密码找回答案&nbsp;:</label>
            <div class="controls">
              <input class="input-xlarge" type="text" id="answer" name="answer" value="<?=$row->answer?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="name">姓名&nbsp;:</label>
            <div class="controls">
              <input class="input-xlarge" type="text" id="name" name="name" value="<?=$row->name?>" disabled>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="major">专业&nbsp;:</label>
            <div class="controls">
              <input class="input-xlarge" type="text" id="major" name="major" value="<?=$row->major?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="email">邮箱&nbsp;:</label>
            <div class="controls">
              <input class="input-xlarge" type="text" id="email" name="email" value="<?=$row->email?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="tel">联系电话&nbsp;:</label>
            <div class="controls">
              <input class="input-xlarge" type="text" id="tel" name="tel" value="<?=$row->tel?>">
            </div>
          </div>
          <div class="control-group">            
            <div class="controls">
              <input type="submit" class="btn btn-primary" value="确认修改">
            </div>
          </div>
        </form> <!-- form-horizontal -->

      </div> <!-- right content -->
    </div>
  </div> <!-- content -->

