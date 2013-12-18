<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>resource/css/login.css" />
    <script type="text/javascript" src="http://code.jquery.com/jquery.js?>"></script>
    <title>软件工程学习网</title>
  </head>
  <body>
    <!--登录表单-->
    <?php echo form_open('login', array('id' => 'myform')); ?>
      <h1>欢迎进入&nbsp;软件工程学习网</h1>
      <!--显示错误信息-->
      <div class="alert"><?php echo validation_errors(); ?></div>      
      <div class="inset">
        <!--输入区域-->
        <p>
          <label for="userid">User ID</label>
          <input type="text" name="userid" id="userid" value="teacher">
        </p>
        <p>
          <label for="password">Password</label>
          <input type="password" name="password" id="password" value="teacher">
        </p>
        <label class="inline">Role:&nbsp;&nbsp;&nbsp;</label>
        <label class="radio inline">
          <input type="radio" name="role" id="option1" value="T" checked>教师
        </label>
        <label class="radio inline">
          <input type="radio" name="role" id="option2" value="A">助教
        </label>
        <label class="radio inline">
          <input type="radio" name="role" id="option3" value="S">学生
        </label>
        <p>
          <input type="checkbox" name="remember" id="remember" checked>
          <label for="remember">Remember me for 14 days</label>
        </p>  
      </div><!--inset-->
      <p class="p-container">
        <!--按钮区域-->
        <a id="forgetpassword" href="<?=site_url()?>findpw.html">忘记密码？</a>
        <input id="loginsubmit" type="submit" name="go" value="登陆"/>
        <input id="visitsubmit" type="submit" name="go" id="go" value="游客浏览"/>
      </p>
    </form>
  </body>
</html>
