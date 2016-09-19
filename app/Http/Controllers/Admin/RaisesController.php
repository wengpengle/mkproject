<?php
/**
 * Created by PhpStorm.
 * User: [翁鹏乐]
 * Date: 2016/9/18
 * Time: 14:17
 */

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use DB;
use Request;
use Illuminate,Requests;
class RaisesController extends Controller{
    /*
    	添加课程体系
     */
    public function raises_class_one_add(){
        return view('admin.raises_class_one_add');
    }
    /*
    	添加课程方向
     */
    public function raises_class_two_add(){
        if(Request::isMethod('post'))
        {

        }else{
        	$arr_one=DB::table('raises_class_one')->get();
        	return view('admin.raises_class_two_add',['arr_one'=>$arr_one]);
        }
    }
    /*
     * 添加具体课程页面
     */
    public function raises_add(){
        return view('admin.raises_add');
    }
    /*
    	课程列表
     */
    public function raises_list(){
        return view('admin.raises_list');
    }
    //  /*
    //  * 实现 课程分类递归
    //  */
    // public function course_type_tree( $array , $parent_id = 0 , $level = 0 ){
    //     static $new_array = '';
    //     foreach( $array as $key => $value ){
    //         if( $value['parent_id'] == $parent_id ){
    //             $value['level'] = $level;
    //             $new_array[] = $value;
    //             $this -> course_type_tree( $array, $value['type_id'] ,$level+1 );
    //         }
    //     }
    //     return $new_array;
    // }
}