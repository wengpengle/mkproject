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
        		//上传文件的后缀.
        		$extension = $file -> getClientOriginalExtension();
        		#文件上传的路径
				$path = 'uploads/raises_one/'.date('Y').'/'.date('m').'/'.date('d').'/';
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
        if(Request::isMethod('post')){
        	$teacher_id=1;
        	$rai_pic=Request::file('rai_pic');
        	$rai_video=Request::file('rai_video');
        	// 封面上传
        		#上传文件的后缀.
        		$pic_extension = $rai_pic -> getClientOriginalExtension();
        		#文件上传的路径
				$pic_path = 'uploads/raises/picture/'.date('Y').'/'.date('m').'/'.date('d').'/';
				if( !file_exists( $pic_path ) ){
				    mkdir( $pic_path, 0777, true);
				}
				//新名字
				$pic_newname = date('ymdhis').time().".".$pic_extension;
        		$rai_pic -> move($pic_path,$pic_newname);
        		$pic_upload=$pic_path.$pic_newname;
        	// 视频上传
        		#上传文件的后缀.
        		$video_extension = $rai_video -> getClientOriginalExtension();
        		#文件上传的路径
				$video_path = 'uploads/raises/video/'.date('Y').'/'.date('m').'/'.date('d').'/';
				if( !file_exists( $video_path ) ){
				    mkdir( $video_path, 0777, true);
				}
				//新名字
				$video_newname = date('ymdhis').time().".".$video_extension;
        		$rai_video -> move($video_path,$video_newname);
        		$video_upload=$video_path.$video_newname;

        		$data=Request::input();
        		unset($data['cp_name']);
        		$data['rai_pic']=$pic_upload;
        		$data['rai_video']=$video_upload;
        		$data['rai_time']=date('Y-m-d H:i:s',time());
        		$data['teacher_id']=$teacher_id;
        		$result=DB::table('raises')->insert($data);
        		if($result){
        			$arr['cp_name']=Request::input('cp_name');
        			$arr['cp_time']=date('Y-m-d H:i:s',time());
        			$arr['parent_id']=$data['cp_id'];
        			$arr['model_id']=1;
        			DB::table('course_part')->insert($arr);
        			return redirect('admin/raises_list');
        		}
        }else{
        	#查询课程章节数据
            $course_part = DB::table('course_part') 
            				->where('model_id','=',1)
            				-> get();
            #调用函数 实现无限极
            $course_part = $this -> course_part_tree( $course_part );
            #课程体系
            $arr_one=DB::table('raises_class_one')->get();
            #课程方向
            $arr_two=DB::table('raises_class_two')->get();
        	return view('raises.raises_add',['coursePart' => $course_part,'arr_one'=>$arr_one,'arr_two'=>$arr_two]);
        }
    }
    /*
    	课程列表
     */
    public function raises_list(){
    	$arr=DB::table('raises')
    			 ->leftjoin('raises_class_two','raises.rct_id','=','raises_class_two.rct_id')
    			 ->leftjoin('raises_class_one','raises_class_two.rco_id','=','raises_class_one.rco_id')
    			 ->leftjoin('course_part','raises.cp_id','=','course_part.cp_id')
    			 ->leftjoin('user','raises.teacher_id','=','user.user_id')
    			 ->select('raises.*', 'raises_class_two.rct_title', 'course_part.cp_name','raises_class_one.rco_title','user.username','raises_class_one.type_name')
    			 ->get();
        return view('raises.raises_list',['arr'=>$arr]);
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