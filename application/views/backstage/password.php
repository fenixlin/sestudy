<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>resource/css/bootstrap.min.css" />
  <script type="text/javascript" src="http://code.jquery.com/jquery.js?>"></script>
  <script type="text/javascript" src="<?=base_url()?>resource/js/bootstrap.min.js"></script>  
  <title>软件工程学习网</title>
</head>

<body style="background-color:#b5b5b5; margin-top:250px; margin-bottom:80px">  

  <div class="container" style="width:400px">
    <div style="margin:0 auto 20px; padding:10px 15px 10px; background-color:#fff; border: 1px solid #c5c5c5; -webkit-border-radius:10px; border-radius: 10px; -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.1); box-shadow:0 1px 2px rgba(0,0,0,.1);">      
      <strong>请输入后台密码</strong>
      <input type="text" class="input-medium">
      <button class="btn" onclick="javascript:window.location.href='<?=site_url()?>backstage/mainpage.html'">确认</button>      
      <a href="<?=site_url()?>main">返回</a>
    </div>
  </div>
</body>

</html>
