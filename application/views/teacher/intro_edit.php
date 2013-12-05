  <div id="content" class="main box container-fluid">
    <div class="row-fluid">
      <div id="sidecontent" class="span3">
        <div id="sidebar">
          <ul class="nav nav-list">
            <li class="nav-header">导航</li>
            <li class="active"><a href="<?=site_url()?>intro.html">课程介绍</a></li>
            <li><a href="<?=site_url()?>outline.html">课程大纲</a></li>
            <li><a href="<?=site_url()?>tinfo.html">教师介绍</a></li>
            <li class="divider"></li>
            <li><a href="<?=site_url()?>account.html">学生账号管理</a></li>
            <li><a href="<?=site_url()?>group.html">学生分组</a></li>            
            <li class="divider"></li>
            <li><a href="<?=site_url()?>slide.html">课件上传</a></li>
            <li><a href="<?=site_url()?>resource.html">资料上传</a></li>
            <li><a href="<?=site_url()?>share.html">共享资料管理</a></li>
            <li class="divider"></li>
            <li><a href="<?=site_url()?>notice.html">消息发布</a></li>
            <li><a href="<?=site_url()?>assignment.html">作业管理</a></li>
            <li><a href="<?=site_url()?>forum.html">课程讨论区</a></li>
          </ul>
        </div> <!-- sidebar -->
      </div> <!-- sidecontent -->

      <div id="maincontent" class="span9">
        <?php $data = $this->intro_model->get_data();?>
        <?php echo form_open('intro');?>
          <table class="table table-bordered table-hover">
            <tbody>
              <tr class="info">
                <td class="span2"><strong>课程名称：</strong></td>
                <td><input class="input-block-level" type="text" id="c_name" name="c_name" value="<?=$data->c_name?>"></td>
              </tr>
              <tr>
                <td><strong>课程英文名称：</strong></td>
                <td><input class="input-block-level" type="text" id="e_name" name="e_name" value="<?=$data->e_name?>"></td>
              </tr>
              <tr class="info">
                <td><strong>课程代码：</strong></td>
                <td><input class="input-block-level" type="text" id="course_code" name="course_code" value="<?=$data->course_code?>"></td>
              </tr>
              <tr>
                <td><strong>开课学院：</strong></td>
                <td><input class="input-block-level" type="text" id="academy" name="academy" value="<?=$data->academy?>"></td>
              </tr>
              <tr class="info">
                <td><strong>学分：</strong></td>
                <td><input class="input-block-level" type="text" id="credit_hour" name="credit_hour" value="<?=$data->credit_hour?>"></td>
              </tr>
              <tr>
                <td><strong>周学时：</strong></td>
                <td><input class="input-block-level" type="text" id="week_hour" name="week_hour" value="<?=$data->week_hour?>"></td>
              </tr>
              <tr class="info">
                <td><strong>开课学期：</strong></td>
                <td><input class="input-block-level" type="text" id="season" name="season" value="<?=$data->season?>"></td>
              </tr>
              <tr>
                <td><strong>课程归属：</strong></td>
                <td><input class="input-block-level" type="text" id="belong" name="belong" value="<?=$data->belong?>"></td>
              </tr>
              <tr class="info">
                <td><strong>预修要求：</strong></td>
                <td><input class="input-block-level" type="text" id="requirement" name="requirement" value="<?=$data->requirement?>"></td>
              </tr>
              <tr>
                <td><strong>推荐教材：</strong></td>
                <td><textarea id="textbook" name="textbook" style="width:100%;height:10px;"><?=$data->textbook?></textarea></td>
              </tr>
              <tr class="info">
                <td><strong>课程简介：</strong></td>
                <td><textarea id="c_intro" name="c_intro" style="width:100%;height:10px;"><?=$data->c_intro?></textarea></td>
              </tr>
              <tr>
                <td><strong>英文简介：</strong></td>
                <td><textarea id="e_intro" name="e_intro" style="width:100%;height:10px;"><?=$data->e_intro?></textarea></td>
              </tr>
            </tbody>
          </table>
          <hr>
          <div class="span2 offset9">
              <button type="submit" class="btn btn-large btn-primary btn-block">提交</button>
          </div>
        </form>
      </div> <!-- main content -->
    </div> <!-- row-fluid -->
  </div> <!-- content -->

<script type="text/javascript">
  var ue1 = UM.getEditor('textbook');
  var ue2 = UM.getEditor('c_intro');
  var ue3 = UM.getEditor('e_intro');
</script>