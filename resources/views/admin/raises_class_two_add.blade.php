<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新增课程</title>
<link rel="stylesheet" type="text/css" href="css/erweima-style.css" />
</head>
<body>
<div class="chuda_co" id="container">
  <div class="co-box">
	<div class="title"><h4>课程管理>>新增课程</h4></div>
<div class="fill-info">
    <div class="right">
        <a class="btn02" id="xg_btn" href="javascript:;">课程列表</a>
        {{--表单--}}
        <form action="{{url('admin/raises_class_two_add')}}" method="post" enctype="multipart/form-data">
    <div class="info-box">
      <ul>
          <!--  父类的课程填写表单 -->
          <div id="child">
              <li>
                  <label>选择课程体系：</label>
                  <select class="w200" name="rco_id">
                      <option value="0">--请选择--</option>
                      <?php foreach($arr_one as $k=>$v){ ?>
                      <option value="{{ $v['rco_id'] }}">{{ $v['rco_title'] }}</option>
                      <?php } ?>
                  </select>
              </li>
              <li>
                  <label>课程方向名称：</label>
                  <input type="text" name="rct_name" class="w200 name" value="">
              </li>
              <li>
                  <label>描述：</label>
                  <textarea style="height:100px;" name="rct_desc" cols="30" rows="10" class="w200 name">
                  </textarea>
              </li>
          </div>
      </ul>
    </div>
    <div class="preview">
        <input type="submit" disabled="none" value="添加" class="preview-btn btn01">
        <input type="reset" value="重置" class="cancel-btn btn01">
    </div>
        </form>
  </div>
</div>
</div>
    </div>
</body>
</html>
