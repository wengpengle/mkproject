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
        <form action="{{url('admin/course')}}" method="post" enctype="multipart/form-data">
    <div class="info-box">
      <ul>
          <!--  父类的课程填写表单 -->
          <div id="child">
              <li>
                  <label>课程名称：</label>
                  <input type="text" name="name" class="w200 name" value="">
              </li>
              <li>
                  <label>课程分类：</label>
                  <select class="w200" name="type_id">
                      <option value="">--请选择--</option>
                      @if( empty( $course ))
                      @else
                          @foreach( $course as $key => $value )
                              <option value="{{$value['type_id']}}">{{str_repeat('|--',$value['level'])}}{{$value['type_name']}}</option>
                          @endforeach
                      @endif
                  </select>
              </li>
              <li>
                  <label>课程描述：</label>
                  <textarea name="cou_desc" cols="30" rows="10" class="w200 name">

                  </textarea>
              </li>

              <li>
                  <label>课程等级：</label>
                  <select class="w200" name="cou_grade">
                      <option value="1">初级</option>
                      <option value="2">中级</option>
                      <option value="3">高级</option>
                  </select>
              </li>
              <li>
                  <label>课程父级章节：</label>
                  <select class="w200" name="cou_grade">
                      <option value="">-- 请选择课程父级章节 --</option>
                      <option value="2">中级</option>
                      <option value="3">高级</option>
                  </select>
              </li>
              <li>
                  <label>课程所属章节：</label>
                  <input type="text" name="name" class="w200 name" value="">
              </li>
              <li>
                  <label>课程海报：</label>
                  <input type="file" name="cou_pic" class="w200 name">
              </li>
              <li>
                  <label>课程视频：</label>
                  <input type="file" name="cou_video" class="w200 name">
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
<script>
    function dis_child(){
        document.getElementById('child').style.display='block';
        document.getElementById('parent').style.display='none';
    }
    function dis_parent(){
        document.getElementById('child').style.display='none';
        document.getElementById('parent').style.display='block';
    }
</script>
