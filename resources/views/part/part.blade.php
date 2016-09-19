<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新增章节</title>
<link rel="stylesheet" type="text/css" href="css/erweima-style.css" />
    {{--引入Jquery文件--}}
    <link rel="stylesheet" type="text/css" href="js/jquery.js" />
</head>
<body>
<div class="chuda_co" id="container">
  <div class="co-box">
	<div class="title"><h4>章节管理>>新增章节</h4></div>
<div class="fill-info">
    <div class="right">
        <a class="btn02" id="xg_btn" href="{{url('admin/course_type_list')}}">章节列表</a>
        {{--表单--}}
    <form action="{{url('admin/part')}}" method="post">
    <div class="info-box">
      <ul>
          <!--  父类的章节分类填写表单 -->
          <div id="child">
              <li>
                  <label>课程章节名称：</label>
                  <input type="text" name="cp_name" class="w200 name" value="">
              </li>
              <li>
                  <label>父级课程章节：</label>
                  <select class="w200" name="parent_id">
                      <option value="0">--请选择--</option>
                      @if( empty( $coursePart ))
                      @else
                          @foreach( $coursePart as $key => $value )
                              <option value="{{$value['cp_id']}}"> {{str_repeat('&nbsp;&nbsp;├&nbsp;',$value['level'])}} {{$value['cp_name']}}</option>
                          @endforeach
                      @endif
                  </select>
                  <span>&nbsp;&nbsp;&nbsp;如果不选择、则默认添加的章节名称为父级章节</span>
              </li>
              <li>
                  <label>课程节所属模块：</label>
                  <select class="w200" name="model_id">
                      <option value="0">--请选择--</option>
                      <option value="1">利器加薪模块</option>
                      <option value="2">普通课程模块</option>
                  </select>
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
