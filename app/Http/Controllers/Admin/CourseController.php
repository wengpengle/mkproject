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
     * 后台首页 [ 新增课程分类 ]
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
            $cou_pic = $request -> file('cou_pic');
            #判断文件是否上传
            if( $cou_pic -> isValid() ){
                # 获取文件相关信息
                # 缓存在tmp文件夹中的文件名 例如 php8933.tmp 这种类型的.
                $tmpName = $cou_pic -> getFileName();
                #这个表示的是缓存在tmp文件夹下的文件的绝对路径
                $realPath = $cou_pic -> getRealPath();
                #获取文件后缀
                $prefix = $cou_pic -> getClientOriginalExtension();  // 扩展名
                #大家对mimeType应该不陌生了. 我得到的结果是 image/jpeg.
                $mimeTye = $cou_pic -> getMimeType();
                #文件路径
                $dir = 'uploads/'.date('Y').'/'.date('m').'/'.date('d').'/';
                if( !file_exists( $dir ) ){
                    mkdir( $dir , 0777, true );
                }
                #重新命名文件名称
                $fileName = date('H:i:s').'_'.mt_rand(1,9999).'.'.$prefix;

                $path = $cou_pic -> move($dir,$fileName);
                print_r($path);
            }else{
                echo "<script>alert('没有上传文件');location.href='course'</script>";
            }

        }else{
            #查询课程分类数据
            $course = DB::table('course_type') -> get();
            #调用函数 实现无限极
            $course = $this -> course_type_tree( $course );
            #查询课程章节数据
            $course_part = DB::table('course_part') -> get();
            #调用函数 实现无限极
            $course_part = $this -> course_part_tree( $course_part );
            #渲染模板赋值
            return view('course.course', ['course' => $course , 'coursePart' => $course_part]);
        }

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



    /*
     * 课程列表页
     */
    public function course_list(){
        return view('course.course_list');
    }
}