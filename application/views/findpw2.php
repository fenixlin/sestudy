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
    <?php echo form_open('findpw'); ?>
      <h1>找回密码</h1>
      <!--显示错误信息-->
      <div class="alert"><?php echo validation_errors(); if ($message!="") echo "<p>".$message."</p>"; ?></div>      
      <div class="inset">
        <!--输入区域-->
        <p>
          <input type="hidden" name="formid" id="formid" value="2">   
          <input type="hidden" name="userid" id="userid" value=<?=$userid?>>
          <label for="ques">密码找回问题</label>
          <input type="text" name="ques" id="ques" value=<?=$ques?> disabled="disabled">
          <label for="ans">密码找回答案</label>
          <input type="text" name="ans" id="ans" value="">
        </p>        
      </div><!--inset-->
      <p class="p-container">
        <!--按钮区域-->
        <a id="forgetpassword" href="<?=site_url()?>login.html">返回</a>
        <input id="loginsubmit" type="submit" name="go" value="重置为初始密码"/>
      </p>
    </form>
  </body>
</html>
