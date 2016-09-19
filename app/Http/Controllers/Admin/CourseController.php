<?php
/**
 * Created by PhpStorm.
 * User: [翁鹏乐]
 * Date: 2016/9/18
 * Time: 19:16
 */

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CourseController extends Controller{
    /*
     * 后台首页
     */
    public function course_type(Request $request){
        #判断是否是POST提交
        if( $request -> isMethod( 'post' ) ){
            $data = $request -> input();
            $data['type_time'] = date('Y-m-d H:i:s' ,time() );
            #执行入库操作
            $result = $course = DB::table('course_type') -> insert( $data );
            #判断是否成功
            if( $result ){
                return redirect('admin/course_type_list');
            }else{
                return redirect('admin/course_type');
            }
        }else{
            #查询课程分类数据
            $course = DB::table('course_type') -> get();
            #调用函数 实现无限极
            $course = $this -> course_type_tree( $course );
            return view('course.course_type',['course' => $course]);
        }

    }

    /*
     * 课程分类列表页
     */
    public function course_type_list(){
        #查询课程分类数据
        $course = DB::table('course_type') -> get();
        #调用函数 实现无限极
        $course = $this -> course_type_tree( $course );
        return view('course.course_type_list' ,['course' => $course]);
    }

    /*
     * 实现 课程分类递归
     */
    public function course_type_tree( $array , $parent_id = 0 , $level = 0 ){
        static $new_array = '';
        foreach( $array as $key => $value ){
            if( $value['parent_id'] == $parent_id ){
                $value['level'] = $level;
                $new_array[] = $value;
                $this -> course_type_tree( $array, $value['type_id'] ,$level+1 );
            }
        }
        return $new_array;
    }

    /*
     * 新增课程页面
     */
    public function course(Request $request){
        #判断是否是POST提交
        if( $request -> isMethod('post') ){
            #判断文件上传是否成功
            if( $request -> file('cou_pic') -> isValid() ){
                $cou_pic = $request -> file( 'cou_pic' );
                #获取文件名称
                $picName = $cou_pic -> getClientOriginalName();
                #获取文件后缀
                $prefix = $cou_pic -> getClientOriginalExtension();
                #图片保存路径
                $mimeTye = $cou_pic -> getMimeType();
                #重新命名文件的名称
                $new_file = date('Y-m-d').mt_rand(1,999).'.'.$prefix;
                #创建文件夹
                $dir = 'admin/course/'.date('Y').'/'.date('m').'/'.date('d').'/';
                #判断是否是一个目录
                if( !file_exists( $dir )){
                    mkdir( $dir, 0777, true );
                }

                #移动文件到制定目录
                $path = $cou_pic -> move($dir,$new_file);


                #图片的临时路径
                $picPath = $path -> getRealPath();
            }

        }else{
            #查询课程分类数据
            $course = DB::table('course_type') -> get();
            #调用函数 实现无限极
            $course = $this -> course_type_tree( $course );
            #查询课程章节数据
            $course_part = DB::table('course_part') -> get();
            #调用函数 实现无限极

            return view('course.course', ['course' => $course]);
        }

    }

    /*
     * 课程列表页
     */
    public function course_list(){
        return view('course.course_list');
    }
}