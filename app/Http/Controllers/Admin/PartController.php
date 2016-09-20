<?php
/**
 * Created by PhpStorm.
 * User: [翁鹏乐]
 * Date: 2016/9/19
 * Time: 11:19
 */

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PartController extends Controller{
    /*
     * 新增章节页面
     */
    public function part( Request $request ){
        #判断是否是POST提交
        if( $request -> isMethod('post')){
            $data = $request -> input();
            $data['cp_time'] = date('Y-m-d H:i:s' ,time() );
            #执行入库操作
            $result = $course_part = DB::table('course_part') -> insert( $data );
            #判断是否成功
            if( $result ){
                return redirect('admin/part_list');
            }else{
                return redirect('admin/part');
            }
        }else{
            #查询课程章节数据
            $course_part = DB::table('course_part') -> get();
            #调用函数 实现无限极
            $course_part = $this -> course_part_tree( $course_part );

            return view('part.part', ['coursePart' => $course_part]);
        }

    }

    /*
     * 课程章节列表
     */
    public function part_list(){
        #查询课程章节数据
        $course_part = DB::table('course_part') -> get();
        #调用函数 实现无限极
        $course_part = $this -> course_part_tree( $course_part );
        return view('part.part_list', ['coursePart' => $course_part]);
    }

    /*
     * 实现 课程章节递归
     */
    public function course_part_tree( $array , $parent_id = 0 , $level = 0 ){
        static $new_array = '';
        foreach( $array as $key => $value ){
            if( $value['parent_id'] == $parent_id ){
                $value['level'] = $level;
                $new_array[] = $value;
                $this -> course_part_tree( $array, $value['cp_id'] ,$level+1 );
            }
        }
        return $new_array;
    }
}