<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>左侧菜单</title>
<link rel="stylesheet" type="text/css" href="css/erweima-style.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/js.js"></script>
</head>
<body>
<div class="left_slide_nav">
  <div class="business">
      <dl class="dl_list">
          <dt class="dl_open"><span class="expend_icon"></span><a href="javascript:;">权限管理</a></dt><!--打开状态替换close为open-->
          <dd><a href="xzgly.html" target="rightFrame">新增管理员</a></dd>
          <dd><a href="gly_list.html" target="rightFrame">管理员列表</a></dd>
          <dd><a href="xzjs.html" target="rightFrame">新增角色</a></dd>
          <dd><a href="js_list.html" target="rightFrame">角色列表</a></dd>
          <dd><a href="xzqx.html" target="rightFrame">新增权限</a></dd>
          <dd><a href="fpqx.html" target="rightFrame">分配权限</a></dd>
          <!--当前页面导航条dl添加class为dl_height,dt添加class为dl_open,dd添加class为dd_current-->
      </dl>
    <dl class="dl_list">
      <dt class="dl_open"><span class="expend_icon"></span><a href="javascript:;">课程管理</a></dt><!--打开状态替换close为open-->
      <dd><a href="{{url('admin/course')}}" target="rightFrame">新增课程</a></dd>
      <dd><a href="{{url('admin/course_list')}}" target="rightFrame">课程列表</a></dd>
      <dd><a href="{{url('admin/course_type')}}" target="rightFrame">新增课程分类</a></dd>
      <dd><a href="{{url('admin/course_type_list')}}" target="rightFrame">课程分类列表</a></dd>
      <!--当前页面导航条dl添加class为dl_height,dt添加class为dl_open,dd添加class为dd_current-->
    </dl>
    {{--章节管理--}}
    <dl class="dl_list">
      <dt class="dl_open"><span class="expend_icon"></span><a href="javascript:;">章节管理</a></dt><!--打开状态替换close为open-->
      <dd><a href="{{url('admin/part')}}" target="rightFrame">新增章节</a></dd>
      <dd><a href="{{url('admin/part_list')}}" target="rightFrame">章节列表</a></dd>
      <!--当前页面导航条dl添加class为dl_height,dt添加class为dl_open,dd添加class为dd_current-->
    </dl>
    <dl class="dl_list">
      <dt class="dl_open"><span class="expend_icon"></span><a href="javascript:;">加薪利器</a></dt><!--打开状态替换close为open-->
      <dd><a href="{{url('admin/raises_class_one_add')}}" target="rightFrame">添加课程体系</a></dd>
      <dd><a href="{{url('admin/raises_class_two_add')}}" target="rightFrame">新增课程方向</a></dd>
      <dd><a href="{{url('admin/raises_add')}}" target="rightFrame">新增课程</a></dd>
      <dd><a href="{{url('admin/raises_list')}}" target="rightFrame">课程列表</a></dd>
      <dd><a href="{{url('admin/raises_type')}}" target="rightFrame">新增课程分类</a></dd>
      <dd><a href="{{url('admin/raises_type_list')}}" target="rightFrame">课程分类列表</a></dd>
      <!--当前页面导航条dl添加class为dl_height,dt添加class为dl_open,dd添加class为dd_current-->
    </dl>
    {{--实战课程模块--}}
    <dl class="dl_list dl_3">
      <dt class="dl_open"><span class="expend_icon"></span><a href="javascript:;">实战课程管理</a></dt><!--打开状态替换close为open-->
      <dd><a href="{{url('admin/actual')}}" target="rightFrame">实战课程</a></dd>
      <dd><a href="{{url('admin/actual_lists')}}" target="rightFrame">实战课程列表</a></dd>
      <dd><a href="{{url('admin/part_info')}}" target="rightFrame">新添实战课程章节</a></dd>
      <dd><a href="{{url('admin/part_lists')}}" target="rightFrame">实战课程列表</a></dd>
    </dl>
    <dl class="dl_list dl_3">
      <dt class="dl_open"><span class="expend_icon"></span><a href="javascript:;">违纪管理</a></dt><!--打开状态替换close为open-->
      <dd><a href="xzwj.html" target="rightFrame">新增违纪</a></dd>
      <dd><a href="wj_list.html" target="rightFrame">违纪列表</a></dd>
      <dd><a href="javascript:;" target="rightFrame">回收站</a></dd>
    </dl>
    <dl class="dl_list dl_3">
      <dt class="dl_open"><span class="expend_icon"></span><a href="javascript:;">违纪统计</a></dt><!--打开状态替换close为open-->
      <dd><a href="javascript:;" target="rightFrame">班级违纪排名</a></dd>
      <dd><a href="javascript:;" target="rightFrame">阶段违纪对比</a></dd>
      <dd><a href="javascript:;" target="rightFrame">违纪类型分析</a></dd>
      <dd><a href="javascript:;" target="rightFrame">互查违纪个数</a></dd>
      <dd><a href="javascript:;" target="rightFrame">讲师违纪KPI</a></dd>
      <dd><a href="javascript:;" target="rightFrame">班主任违纪KPI</a></dd>
    </dl>
    <dl class="dl_list dl_3">
      <dt class="dl_open"><span class="expend_icon"></span><a href="javascript:;">作业管理</a></dt><!--打开状态替换close为open-->
      <dd><a href="javascript:;" target="rightFrame">新增作业</a></dd>
      <dd><a href="javascript:;" target="rightFrame">作业记录</a></dd>
    </dl>
    <dl class="dl_list dl_3">
      <dt class="dl_open"><span class="expend_icon"></span><a href="javascript:;">日志管理</a></dt><!--打开状态替换close为open-->
      <dd><a href="javascript:;" target="rightFrame">添加日志</a></dd>
      <dd><a href="javascript:;" target="rightFrame">我的日志</a></dd>
      <dd><a href="xsrz_list.html" target="rightFrame">学生日志列表</a></dd>
    </dl>
    <dl class="dl_list dl_3">
      <dt class="dl_open"><span class="expend_icon"></span><a href="javascript:;">密码管理</a></dt><!--打开状态替换close为open-->
      <dd><a href="xgmm.html" target="rightFrame">修改密码</a></dd>
    </dl>
  </div>
</div>

</body>
</html>
