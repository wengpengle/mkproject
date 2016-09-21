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
    public function course( Request $request ){
        #判断是否是POST提交
        if( $request -> isMethod('post') ){
            #上传图片
            $file = $request -> file('cou_pic');
            #调用函数上传图片
            $resultImg = uploadImg( $file );
            if( !empty( $resultImg['status'] ) ){
                echo "<script>alert('上传的图片格式不正确');location.href='course'</script>";
                exit();
            }
            #上传视频
            $cou_video = $request -> file('cou_video');
            #调用函数上传视频
            $resultVideo = uploadVideo( $cou_video );
            if( !empty( $resultVideo['status'] ) ){
                echo "<script>alert('上传的视频格式不正确');location.href='course'</script>";
                exit();
            }

            #接收章节信息
            $cp_data['cp_name'] = $request -> input('cp_name');
            $cp_data['parent_id'] = $request -> input('parent_id');
            $cp_data['model_id'] = $request -> input('model_id');
            $cp_data['cp_time'] = date('Y-m-d H:i:s',time());

            #验证章节唯一性
            $cp_name = DB::table('course_part') -> where('cp_name',$cp_data['cp_name']) -> first();
            if( empty($cp_name) ){
                #章节名称不存在 则 执行 章节信息执行入库操作
                $cp_id = DB::table('course_part') -> insertGetId( $cp_data );
            }else{
                echo "<script>alert('章节名称已存在、不可以重复添加');location.href='course'</script>";
                exit();
            }


            #判断章节添加是否成功
            if( $cp_id ){

                #接收课程数据
                $data = $request -> input();
                unset($data['model_id']);
                unset($data['cp_name']);
                unset($data['parent_id']);
                # 图片和视频的路径
                $data['cou_pic'] = $resultImg['path'];
                $data['cou_video'] = $resultVideo['path'];
                $data['cou_time'] = date('Y-m-d H:i:s',time());
                #章节ID
                $data['cp_id'] = $cp_id;
                #登录讲师的ID
                $data['teacher_id'] = rand(1,10);

                #课程执行入库操作
                $result = DB::table('course') -> insert( $data );

                #判断添加是否成功
                if( $result ){
                    echo "<script>alert('上传课程信息成功');location.href='course_list'</script>";
                }else{
                    echo "<script>alert('上传课程信息失败');location.href='course'</script>";
                    exit();
                }
            }else{
                echo "<script>alert('添加课程章节失败');location.href='course'</script>";
                exit();
            }

        }else{
            #查询课程分类数据
            $course = DB::table('course_type') -> get();
            #调用函数 实现无限极
            $course = $this -> course_type_tree( $course );
            #查询课程章节数据
            $course_part = DB::table('course_part') -> where('model_id','=','2') -> get();
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
        #查看课程信息
        $course = DB::table('course') ->join('course_part','course.cp_id','=','course_part.cp_id')
                            -> where('model_id','=','2') -> get();

        return view('course.course_list',['course' => $course]);
    }
}