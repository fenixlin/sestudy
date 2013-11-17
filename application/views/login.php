<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>resource/css/login.css" />
    <title>软件工程学习网</title>
  </head>
  <body>
    <!--登录表单-->
    <?php echo form_open('login'); ?>
      <h1>欢迎进入&nbsp;软件工程学习网</h1>
      <div class="inset">
        <!--输入区域-->
        <p>
          <label for="userid">User ID</label>
          <input type="text" name="userid" id="userid" value="student">
        </p>
        <p>
          <label for="password">Password</label>
          <input type="password" name="password" id="password" value="student">
        </p>
        <label class="inline">Role:&nbsp;&nbsp;&nbsp;</label>
        <label class="radio inline">
          <input type="radio" name="role" id="option1" value="T">教师
        </label>
        <label class="radio inline">
          <input type="radio" name="role" id="option2" value="A">助教
        </label>
        <label class="radio inline">
          <input type="radio" name="role" id="option3" value="S" checked>学生
        </label>
        <p>
          <input type="checkbox" name="remember" id="remember" checked>
          <label for="remember">Remember me for 14 days</label>
        </p>  
        <!--显示错误信息-->
        <div class="alert"><?php echo validation_errors(); ?></div>
      </div>
      <p class="p-container">
        <!--按钮区域-->
        <span>忘记密码 ?</span>        
        <input id="loginsubmit" type="submit" name="go" id="go" value="登陆"/>
        <input id="visitsubmit" type="submit" name="go" id="go" value="游客浏览"/>
      </p>
    </form>
  </body>
</html>
