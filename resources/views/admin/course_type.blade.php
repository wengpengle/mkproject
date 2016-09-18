<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新增课程分类</title>
<link rel="stylesheet" type="text/css" href="css/erweima-style.css" />
</head>
<body>
<div class="chuda_co" id="container">
  <div class="co-box">
	<div class="title"><h4>课程分类管理>>新增课程分类</h4></div>
<div class="fill-info">
    <div class="right">
        <a class="btn02" id="xg_btn" href="{{url('admin/course_type_list')}}">课程分类列表</a>
        {{--表单--}}
    <form action="{{url('admin/course_type')}}" method="post">
    <div class="info-box">
      <ul>
          <!--  父类的课程分类填写表单 -->
          <div id="child">
              <li>
                  <label>课程分类名称：</label>
                  <input type="text" name="type_name" class="w200 name" value="">
              </li>
              <li>
                  <label>父级课程分类：</label>
                  <select class="w200" name="parent_id">
                      <option value="0">--请选择--</option>
                      @if( empty( $course ))

                      @else
                          @foreach( $course as $key => $value )
                              <option value="{{$value['type_id']}}"> {{str_repeat('|--',$value['level'])}} {{$value['type_name']}}</option>
                          @endforeach
                      @endif
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
