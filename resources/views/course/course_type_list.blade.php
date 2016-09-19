<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>班级列表</title>
<link rel="stylesheet" type="text/css" href="css/erweima-style.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/js.js"></script>
</head>

<body>
<div class="chuda_co" id="container">
  <div class="co-box">
    <div class="title">
      <h4>课程分类管理>>列表</h4>
    </div>
    <div class="right"> 
    	<a class="btn03" href="{{url('admin/course_type')}}">新增课程分类</a>
      <!--detail start-->
      <div class="co-detail clearfix"> 
        <table class="tablelist" border="0" cellpadding="0" cellspacing="0">
            <thead>
              <tr>
                <th>分类编号</th>
                <th>分类名称</th>
                <th>添加时间</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
            @foreach( $course as $key => $value )
              <tr>
                <td>{{$value['type_id']}}</td>
                <td>{{str_repeat('-- ',$value['level'])}} {{$value['type_name']}}</td>
                <td>{{$value['type_time']}}</td>
                <td class="operation">
                    <a class="edit">修改</a> | <a class="edit">删除</a>
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
<div class="pop_layer add-mess">
  <div class="fill-info pop-layer-box">
    <h3 class="title-big">修改班级信息</h3><a class="pop-close">X</a>
    <div class="info-box">
      <ul>
        <li>
          <label>班级名称：</label>
          <input type="text" name="name" class="w200 name" value="">
        </li>
        <li>
          <label>班主任：</label>
          <select class="w200">
            <option>于强</option>
            <option>张三</option>
          </select>
        </li>
        <li>
          <label>讲师：</label>
          <select class="w200">
            <option>李朋</option>
            <option>王五</option>
          </select>
        </li>
      </ul>
    </div>
    <div class="preview"> <a class="preview-btn btn01">保存</a> <a class="cancel-btn btn01">取消</a> </div>
  </div>
</div>
</body>
</html>
