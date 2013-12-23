  <div id="content" class="main box container-fluid">
    <div class="row-fluid">
      <div id="sidecontent" class="span3">
        <div id="sidebar">
          <ul class="nav nav-list">
            <li class="nav-header">导航</li>
            <li><a href="<?=site_url()?>intro.html">课程介绍</a></li>
            <li><a href="<?=site_url()?>outline.html">课程大纲</a></li>
            <li><a href="<?=site_url()?>tinfo.html">教师介绍</a></li>
            <li class="divider"></li>
            <li><a href="<?=site_url()?>account.html">学生账号管理</a></li>
            <li class="active"><a href="<?=site_url()?>group.html">学生分组</a></li>            
            <li class="divider"></li>
            <li><a href="<?=site_url()?>slide.html">课件管理</a></li>
            <li><a href="<?=site_url()?>upload.html">资料管理</a></li>
            <li><a href="<?=site_url()?>share.html">共享资源管理</a></li>
            <li class="divider"></li>
            <li><a href="<?=site_url()?>notice.html">消息发布</a></li>
            <li><a href="<?=site_url()?>assignment.html">作业管理</a></li>
            <li><a href="<?=site_url()?>forum.html">课程讨论区</a></li>
          </ul>
        </div> <!-- sidebar -->
      </div> <!-- sidecontent -->

      <div id="maincontent" class="span9">
<button class="btn" style="float:right; margin-right:10px;">从其他课程导入</button>       
        <legend><strong>班级学生列表</strong></legend>
      <table class="table table-hover">
        <tbody>
          <tr class="info">
            <td style="width:10%">
              id
            </td>
            <td style="width:20%">
              姓名
            </td>
            <td style="width:30%">
              邮箱
            </td>
            <td style="width:30%">
              电话
            </td>
            <td>
              小组
            </td>
          </tr>
          <tr>
            <td style="width:10%">
              1
            </td>
            <td style="width:20%">
              林靖豪
            </td>
            <td style="width:30%">
              fenixl@163.com
            </td>
            <td style="width:30%">
              18731287948
            </td>
            <td>
              <input class="input-mini" type="text">
            </td>
          </tr>
          <tr class="info">
            <td style="width:10%">
              2
            </td>
            <td style="width:20%">
              黄坤
            </td>
            <td style="width:30%">
              kunhuang@163.com
            </td>
            <td style="width:30%">
              18683712733
            </td>
            <td>
              <input class="input-mini" type="text">
            </td>
          </tr>
        </tbody>        
      </table>
      <button class="btn btn-primary">提交</button>
       
      </div> <!-- main content -->
    </div> <!-- row-fluid -->
  </div> <!-- content -->

<script language="JavaScript" type="text/JavaScript">
function HandleOnClose(url) {
  var close = confirm("确认删除此消息？");
  if ( close) {
    window.open(url, '_self');
  }
  else
  {
    window.event;
  }
}
</script>
