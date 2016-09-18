<?php
/**
 * Created by PhpStorm.
 * User: [翁鹏乐]
 * Date: 2016/9/18
 * Time: 19:16
 */

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

class CourseController extends Controller{
    /*
     * 后台首页
     */
    public function course_type(){
        return view('admin.course_type');
    }

}