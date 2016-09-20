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
        <form action="{{url('admin/raises_add')}}" method="post" enctype="multipart/form-data">
    <div class="info-box">
      <ul>
          <!--  父类的课程填写表单 -->
          <div id="child">
              <li>
                  <label>课程名称：</label>
                  <input type="text" name="rai_name" class="w200 name" value="">
              </li>
               <li>
                  <label>所属大章节：</label>
                  <select name="cp_id" id="">
                    <option value="0">--请选择--</option>
                      @if( empty( $coursePart ))
                      @else
                          @foreach( $coursePart as $key => $value )
                              <option value="{{$value['cp_id']}}" <?php if($value['parent_id']!=0){echo 'disabled';} ?>> {{str_repeat('&nbsp;&nbsp;>>>&nbsp;',$value['level'])}} {{$value['cp_name']}}</option>
                          @endforeach
                      @endif
                  </select>
              </li>
              <li>
                  <label>具体小章节名称：</label>
                  <input type="text" name="cp_name" class="w200 name" value="">
              </li>
               <li>
                  <label>所属课程方向：</label>
                  <select name="rct_id" id="">
                    <option value="0">--请选择--</option>
                    @foreach( $arr_one as $key => $value )
                    <option disabled value="">{{ $value['rco_title'] }}</option>
                      @foreach( $arr_two as $k => $v )
                        @if( $v['rco_id'] == $value['rco_id'] )
                            <option value="{{ $v['rct_id'] }}">>>>{{ $v['rct_title'] }}</option>
                        @endif
                      @endforeach
                    @endforeach
                  </select>
              </li>
              <li>
                  <label>课程描述：</label>
                  <textarea style="height:100px;" name="rai_desc" cols="30" rows="10" class="w200 name"></textarea>
              </li>
              <li>
                  <label>课程海报：</label>
                  <input type="file" name="rai_pic" class="w200 name">
              </li>
              <li>
                  <label>课程视频：</label>
                  <input type="file" name="rai_video" class="w200 name">
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
