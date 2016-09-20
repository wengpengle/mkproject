<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>实战课程章节列表</title>
    <link rel="stylesheet" type="text/css" href="css/erweima-style.css" />
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/js.js"></script>
    <base href="{{URL::asset('')}}">

</head>

<body>
<div class="chuda_co" id="container">
    <div class="co-box">
        <div class="title">
            <h4>实战课程管理>>实战课程章节</h4>
        </div>
        <div class="right">

            <!--detail start-->
            <div class="co-detail clearfix">
                <table class="tablelist" border="0" cellpadding="0" cellspacing="0">
                    <thead>
                    <tr>
                        <th>实战课程章节ID</th>
                        <th>实战课程章节名称</th>
                        <th>实战课程章节描述</th>
                        <th>所属实战课程名</th>
                        <th>实战课程章节添加时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach($arr as $v)
                            <tr>
                                <td>{{$v->part_id}}</td>
                                <td>{{$v->part_name}}</td>
                                <td>{{$v->part_desc}}</td>
                                <td>{{$v->act_name}}</td>
                                <td>{{$v->part_time}}</td>
                                <td class="operation">
                                    <a class="edit" href="{{url('admin/part_up')}}?id={{$v->part_id}}">编辑</a>
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
</body>
</html>
