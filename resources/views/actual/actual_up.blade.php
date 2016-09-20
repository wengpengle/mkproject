<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>实战课程编辑</title>
    <link rel="stylesheet" type="text/css" href="css/erweima-style.css" />
</head>

<body>
<div class="chuda_co" id="container">
    <div class="co-box">
        <div class="title"><h4>实战课程管理>>实战课程编辑</h4></div>
        <div class="fill-info">
            <div class="right">
                <a class="btn02" id="xg_btn" href="javascript:;">实战课程列表</a>
                <center>
                    <div class="info-box">
                        <form action="{{url('admin/actual_up')}}" method="post" enctype="multipart/form-data">
                            <table>
                                <tr>
                                    <td><label>实战课程名称：</label></td>
                                    <td><input type="text" name="act_name" class="w200 name" value="{{$info->act_name}}"></td>
                                </tr>
                                <tr>
                                    <td> <label>实战课程介绍：</label></td>
                                    <td><textarea name="act_desc" id="" cols="30" rows="10">{{$info->act_desc}}</textarea></td>
                                </tr>
                                <tr>
                                    <td> <label>实战课程封面：</label></td>
                                    <td>  <input type="file" name="act_pic"></td>
                                </tr>
                                <tr>
                                    <td>  <label>实战课程等级：</label></td>
                                    <td>
                                        <input type="radio" name="act_grade" value="1">初级
                                        <input type="radio" name="act_grade" value="2">中级
                                        <input type="radio" name="act_grade" value="3">高级
                                    </td>
                                </tr>
                                <tr>
                                    <td> <label>实战课程价钱：</label></td>
                                    <td>  <input type="text" name="act_price" class="w200 name" value="{{$info->act_price}}"></td>
                                </tr>
                                <tr>
                                    <td><label>课程学习所需时间：</label></td>
                                    <td> <input type="text" name="study_time" class="w200 name" value="{{$info->study_time}}"></td>
                                </tr>
                                <tr>
                                    <input type="hidden" name="act_id" value="{{$info->act_id}}">
                                    <td><input type="submit" class="preview-btn btn01" value="保存"></td>
                                    <td><input type="button" class="cancel-btn btn01" value="取消"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </center>

            </div>
        </div>
    </div>
</div>
</body>
</html>
