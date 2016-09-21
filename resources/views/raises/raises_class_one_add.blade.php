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
	<div class="title"><h4>课程管理>>新增课程体系</h4></div>
<div class="fill-info">
    <div class="right">
        <a class="btn02" id="xg_btn" href="javascript:;">课程体系列表</a>
        {{--表单--}}
        <form action="{{url('admin/raises_class_one_add')}}" method="post" enctype="multipart/form-data">
    <div class="info-box">
      <ul>
          <!--  父类的课程填写表单 -->
          <div id="child">
              <li>
                  <label>课程体系名称：</label>
                  <input type="text" name="rco_title" class="w200 name" value="">
              </li>
              <li>
                  <label>课程分类：</label>
                  <select class="w200 " name="type_name">
                      <option value="1">前端</option>
                      <option value="2">后端</option>
                      <option value="3">移动</option>
                      <option value="4">整站</option>
                  </select>
              </li>
              <li>
                  <label>课程体系封面：</label>
                  <input type="file" name="rco_pic" class="w200 name">
              </li>
          </div>
      </ul>
    </div>
    <div class="preview">
        <input type="submit" value="添加" class="preview-btn btn01">
        <input type="reset" value="重置" class="cancel-btn btn01">
    </div>
        </form>
  </div>
</div>
</div>
    </div>
</body>
</html>
