<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>课程信息列表</title>
<link rel="stylesheet" type="text/css" href="css/erweima-style.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/js.js"></script>
<base href="{{ asset('public') }}" />
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
              <li><a class="btn01">查询</a></li><a class="btn03" href="">新增课程</a><a class="btn02" href="">批量删除</a>
            </ul>
          </div>
        </div>
      <!--detail start-->
      <div class="co-detail clearfix"> 
        <table class="tablelist" border="0" cellpadding="0" cellspacing="0">
            <thead>
              <tr>
                <th>课程名称</th>
              	<th width='50'>讲师</th>
                <th width='300'>课程描述</th>
                <th>封面</th>
                <th>视频</th>
                <th>所属课程方向</th>
                <th>所属课程体系</th>
                <th>添加时间</th>
              </tr>
            </thead>
            <tbody>
            @foreach( $arr as $k => $v )
              <tr>
              	<td>{{ $v['rai_name'] }}</td>
                <td>{{ $v['username'] }}</td>
                <td>{{ $v['rai_desc'] }}</td>
                <td><img src="{{ $v['rai_pic'] }}" alt="" width='50' height="50" /></td>
                <td>
                  <video controls="controls" src="{{ $v['rai_video'] }}" width='100' height='100'></video>
                </td>
                <td>{{ $v['rct_title'] }}</td>
                <td>{{ $v['rco_title'] }}</td>
                <td>{{ $v['rai_time'] }}</td>
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

