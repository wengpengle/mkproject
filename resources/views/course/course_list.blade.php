<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>课程信息列表</title>
<link rel="stylesheet" type="text/css" href="css/erweima-style.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/js.js"></script>
  {{--public--}}
  <base href="{{asset('public')}}">
</head>

<body>
<div class="chuda_co" id="container">
  <div class="co-box">
    <div class="title">
      <h4>课程管理>>课程信息列表</h4>
    </div>
    <div class="right container">
        <div class="custom-info">
          <div class="info-box">
            <ul class="ul-datetime">
              <li>
                <label>课程名字：</label>
                <input type="text" class="w100">
              </li>
              <li>
                <label>班级：</label>
                <select class="w100">
                  <option>1407phpC</option>
                </select>
              </li>
              <li><a class="btn01">查询</a></li><a class="btn03" href="{{url('admin/course')}}">新增课程</a><a class="btn02" href="">批量删除</a>
            </ul>
          </div>
        </div>
      <!--detail start-->
      <div class="co-detail clearfix"> 
        <table class="tablelist" border="0" cellpadding="0" cellspacing="0">
            <thead>
              <tr>
              	<th>请选择</th>
                <th>课程编号</th>
                <th>课程名称</th>
                <th>课程图片</th>
                <th>课程等级</th>
                <th>添加时间</th>
                <th>所属章节</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
            @foreach( $course as $key => $value )
              <tr>
              	<td><input type="radio" name="" /></td>
                <td>{{$value['cou_id']}}</td>
                <td>{{$value['cou_name']}}</td>
                <td><img src="{{$value['cou_pic']}}" alt="" width="50" height="50"></td>
                <td>
                  @if( $value['cou_grade'] == '1' )
                    <font color="red">初级</font>
                  @elseif( $value['cou_grade'] == '2')
                    <font color="green">中级</font>
                  @else
                    <font color="#00008b">高级</font>
                  @endif
                </td>
                <td>{{$value['cou_time']}}</td>
                <td>{{$value['cp_name']}}</td>
                <td class="operation">
                  <a class="edit">修改</a> | <a href="">删除</a>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
          <!--分页 start-->
          <div class="pages">
            <div class="sum">共<i>18</i>条记录</div>
            <div class="pages-btn">
              <a class="pre">上一页</a>
              <div class="num-btn"><a class="pages-current">1</a><a>2</a><a>3</a><a>4</a><a>5</a><a>6</a><a>7</a></div>
              <a class="after">下一页</a>
            </div>
          </div>
          <!--分页 end-->
      </div>
      <!--detail end--> 
    </div>
  </div>
</div>

</body>
</html>

