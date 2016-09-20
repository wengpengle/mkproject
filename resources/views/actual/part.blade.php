<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>新增实战课程章节</title>
    <link rel="stylesheet" type="text/css" href="css/erweima-style.css" />
</head>

<body>
<div class="chuda_co" id="container">
    <div class="co-box">
        <div class="title"><h4>实战课程管理>>新增实战课程章节</h4></div>
        <div class="fill-info">
            <div class="right">
                <a class="btn02" id="xg_btn" href="javascript:;">实战课程章节</a>
                <div class="info-box">
                    <form action="{{url('admin/add_part')}}" method="post" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td><label>实战课程章节名称：</label></td>
                                <td><input type="text" name="part_name" class="w200 name" value=""></td>
                            </tr>
                            <tr>
                                <td> <label>实战课程章节介绍：</label></td>
                                <td><textarea name="part_desc" id="" cols="30" rows="10"></textarea></td>
                            </tr>
                            <tr>
                               <td><label>实战课程名：</label></td>
                               <td>
                                   <select class="w200" name="act_id">
                                       <option value="0">请选择实战课程</option>
                                       @foreach($info as $v)
                                           <option value="{{$v->act_id}}">{{$v->act_name}}</option>
                                           @endforeach
                                   </select>
                               </td>

                            </tr>
                            <tr>
                                <td><input type="submit" class="preview-btn btn01" value="保存"></td>
                                <td><input type="button" class="cancel-btn btn01" value="取消"></td>
                            </tr>
                        </table>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>
