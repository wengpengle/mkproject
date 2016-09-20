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
        if(Request::isMethod('post'))
        {
        	$file=Request::file('rco_pic');
        	if($file -> isValid()){
        		//检验一下上传的文件是否有效
        		$clientName = $file -> getClientOriginalName();
        		//缓存在tmp文件夹中的文件名
        		$tmpName = $file ->getFileName();
        		//这个表示的是缓存在tmp文件夹下的文件的绝对路径
        		$realPath = $file -> getRealPath();
        		//上传文件的后缀.
        		$extension = $file -> getClientOriginalExtension();
        		//大家对mimeType应该不陌生了. 我得到的结果是 image/jpeg.
        		$mimeTye = $file -> getMimeType();
        		#文件上传的路径
				$path = 'uploads/raises/'.date('Y').'/'.date('m').'/'.date('d').'/';
				if( !file_exists( $path ) ){
				    mkdir( $path, 0777, true);
				}
				//新名字
				$newName = date('ymdhis').time().".".$extension;
        		$file -> move($path,$newName);
        		$upload=$path.$newName;
        		$data=Request::input();
        		$data['rco_pic']=$upload;
        		$data['rco_time']=date('Y-m-d H:i:s',time());
        		$result=DB::table('raises_class_one')->insert($data);
        		if($result){
        			return redirect('admin/raises_class_two_add');
        		}
        	}
        }else{
        	return view('raises.raises_class_one_add');
        }
    }
    /*
    	添加课程方向
     */
    public function raises_class_two_add(){
        if(Request::isMethod('post'))
        {
        	$data=Request::input();
        	$data['rct_time']=date("Y-m-d H:i:s",time());
        	$result=DB::table('raises_class_two')->insert($data);
        	if($result){
        		return redirect('admin/raises_add');
        	}
        }else{
        	$arr_one=DB::table('raises_class_one')->get();
        	return view('raises.raises_class_two_add',['arr_one'=>$arr_one]);
        }
    }
    /*
     * 添加具体课程页面
     */
    public function raises_add(){
        return view('raises.raises_add');
    }
    /*
    	课程列表
     */
    public function raises_list(){
        return view('raises.raises_list');
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