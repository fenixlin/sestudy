  <div id="content" class="main box container-fluid">
    <div class="row-fluid">
      <div id="sidecontent" class="span3">
        <div id="sidebar">
          <ul class="nav nav-list">
            <li class="nav-header">导航</li>
            <li class="active"><a href="<?=site_url()?>intro.html">课程介绍</a></li>
            <li><a href="<?=site_url()?>outline.html">课程大纲</a></li>
            <li><a href="<?=site_url()?>tinfo.html">教师介绍</a></li>
            <li><a href="<?=site_url()?>share.html">课程资料</a></li>
          </ul>
        </div> <!-- sidebar -->
      </div> <!-- sidecontent -->

      <div id="maincontent" class="span9">
        <?php $data = $this->intro_model->get_data();?>
        <table class="table table-bordered table-hover">
          <tbody>
            <tr class="info">
              <td style="width:18%"><strong>&nbsp;课程名称：</strong></td>
              <td><?=$data->c_name?></td>
            </tr>
            <tr>
              <td><strong>&nbsp;课程英文名称：</strong></td>
              <td><?=$data->e_name?></td>
            </tr>
            <tr class="info">
              <td><strong>&nbsp;课程代码：</strong></td>
              <td><?=$data->course_code?></td>
            </tr>
            <tr>
              <td><strong>&nbsp;开课学院：</strong></td>
              <td><?=$data->academy?></td>
            </tr>
            <tr class="info">
              <td><strong>&nbsp;学分：</strong></td>
              <td><?=$data->credit_hour?></td>
            </tr>
            <tr>
              <td><strong>&nbsp;周学时：</strong></td>
              <td><?=$data->week_hour?></td>
            </tr>
            <tr class="info">
              <td><strong>&nbsp;开课学期：</strong></td>
              <td><?=$data->season?></td>
            </tr>
            <tr>
              <td><strong>&nbsp;课程归属：</strong></td>
              <td><?=$data->belong?></td>
            </tr>
            <tr class="info">
              <td><strong>&nbsp;预修要求：</strong></td>
              <td><?=$data->requirement?></td>
            </tr>
            <tr>
              <td><strong>&nbsp;推荐教材：</strong></td>
              <td><?=$data->textbook?></td>
            </tr>
            <tr class="info">
              <td><strong>&nbsp;课程简介：</strong></td>
              <td><?=$data->c_intro?></td>
            </tr>
            <tr>
              <td><strong>&nbsp;英文简介：</strong></td>
              <td><?=$data->e_intro?></td>
            </tr>
          </tbody>
        </table>
      </div> <!-- main content -->
    </div> <!-- row-fluid -->
  </div> <!-- content -->

