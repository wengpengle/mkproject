<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use DB, Redirect, Input, Response, Request;

class ActualController extends Controller{
    /*
     * 实战课程
     */
    public function index(){
        return view('actual.actual');
    }

    public function add_actual(){
        $arr = \Request::input();
        $file = \Request::file('act_pic');
        $allowed = ["png", "jpg", "gif","jpeg"];
        if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed)) {
            return ['error' => '您只能上传 png, jpg 或 gif格式的图片'];
        }
        $path = '../public/admin/actual/';
        $extension = $file->getClientOriginalExtension();
        $filename = str_random(10).'.'.$extension;
        $file->move($path,$filename);  // 移动文件到指定目录
        $arr['act_pic'] = $path.$filename;
        $arr['act_time'] = date('Y-m-d H:i:s',time());
        $result = DB::table('actual')->insert($arr);
        if($result){
        return Redirect::to('admin/actual_lists');
       }

    }
    public function actual_lists(){
        $arr = DB::table('actual')->paginate(9);
        return view('admin.actual_lists',['arr' => $arr]);
    }
    public function actual_up(){
        if(empty($_GET['id'])){
            $arr = \Request::input();
            $result = DB::table('actual')->where('act_id', $arr['act_id'])->update($arr);
            if($result){
                return Redirect::to('admin/actual_lists');
            }
        }else{
            $info = DB::table('actual')->where('act_id',$_GET['id'])->first();
            return view('admin.actual_up',['info' => $info]);
        }

    }
    public function actual_del(){
        $id =$_GET['act_id'];
        $result = DB::table('actual')->where('act_id',$id)->delete();
        if($result){
            echo 1;
        }
    }
    /***
     * 课程章节
     */
    public function part_info(){
        $info = DB::table('actual')->get();
        return view('admin.part',['info' => $info]);
    }
    public function add_part(){
        $arr = \Request::input();
        $arr['part_time'] = date('Y-m-d H:i:s',time());
        $id = DB::table('part')->insertGetId(['part_name' => $arr['part_name'] , 'part_desc' =>  $arr['part_desc'] ,'part_time' =>  $arr['part_time']]);
        $result = DB::table('actual_part')->insert( [ 'act_id' => $arr['act_id'] , 'part_id' => $id] );
        if($result){
            return Redirect::to('admin/part_lists');
        }
    }
    public function part_lists(){
        $arr = DB::table('actual_part')
            ->join('actual', 'actual_part.act_id', '=', 'actual.act_id')
            ->join('part', 'actual_part.part_id', '=', 'part.part_id')
          -> paginate(10);
      return view('admin.part_lists',['arr' => $arr]);
    }
    public function part_up(){
        if(empty($_GET['id'])){
            $arr = \Request::input();
            $result_one = DB::table('part')->where('part_id',$arr['part_id'])->update(['part_name' => $arr['part_name'],'part_desc' => $arr['part_desc'], 'part_time' => date('Y-m-d H:i:s',time()) ] );
            $result_two = DB::table('actual_part')->where('part_id',$arr['part_id'])->update(['act_id' => $arr['act_id']]);
            if($result_one && $result_two){
                return Redirect::to('admin/part_lists');
            }
        }else{
            $info = DB::table('actual')->get();
            $site = DB::table('part')->where('part_id',$_GET['id'])->first();
            $arr = DB::table('actual_part')
                ->join('actual', 'actual_part.act_id', '=', 'actual.act_id')
                ->join('part', 'actual_part.part_id', '=', 'part.part_id')
                ->where('part.part_id',$_GET['id'])->first();
            return view('admin.part_up',['info' => $info ,'site' => $site ,'arr' => $arr ] );
        }
    }

}