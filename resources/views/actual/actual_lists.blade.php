<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>实战课程列表</title>
    <link rel="stylesheet" type="text/css" href="css/erweima-style.css" />
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/js.js"></script>
    <base href="{{URL::asset('')}}">
</head>

<body>
<div class="chuda_co" id="container">
    <div class="co-box">
        <div class="title">
            <h4>实战课程管理>>实战课程</h4>
        </div>
        <div class="right">

            <!--detail start-->
            <div class="co-detail clearfix">
                <table class="tablelist" border="0" cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th>实战课程ID</th>
                            <th>实战课程名称</th>
                            <th>实战课程介绍</th>
                            <th>实战课程封面</th>
                            <th>实战课程等级</th>
                            <th>实战课程添加时间</th>
                            <th>实战课程价钱</th>
                            <th>课程学习所需时间</th>
                            <th>操作</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($arr as $v)
                        <tr id="b{{$v->act_id}}">
                            <td>{{$v->act_id}}</td>
                            <td>{{$v->act_name}}</td>
                            <td>{{$v->act_desc}}</td>
                            <td>
                                <a href="{{$v->act_pic}}" target="_blank"><img src="{{$v->act_pic}}" height="30px"></a>

                            </td>
                            <td>
                                @if($v->act_grade== 1)
                                    初级
                                @elseif($v->act_grade== 2)
                                    中级
                                @else
                                    高级
                                    @endif
                            </td>
                            <td>{{$v->act_time}}</td>
                            <td>￥{{$v->act_price}}</td>
                            <td>{{$v->study_time}}</td>
                            <td class="operation">
                                <a class="edit" href="{{url('admin/actual_up')}}?id={{$v->act_id}}">编辑</a>  |  <a class="edit" href="javascript:void(0)" onclick="ck_del({{$v->act_id}})">删除</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
                <!--分页 start-->
                <div class="pages">
                    <center>
                        {!! $arr->links() !!}
                    </center>
                </div>
                <!--分页 end-->
            </div>
            <!--detail end-->
        </div>
    </div>
</div>
<script type="text/javascript">
    function ck_del(id){
        $.ajax({
            type: "GET",
            url: "{{url('admin/actual_del')}}",
            data: "act_id="+id,
            success: function(msg){
                $("#b"+id).remove();
            }
        });
    }
</script>
</body>
</html>
