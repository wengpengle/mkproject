<?php
/**
 * Created by PhpStorm.
 * User: [翁鹏乐]
 * Date: 2016/9/18
 * Time: 14:25
 */

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

class IndexController extends Controller{
    /*
     * 后台首页
     */
    public function index(){
        return view('admin.index');
    }

    /*
     * 后台 top 部分
     */
    public function top(){
        return view('admin.top');
    }

    /*
     * 后台 left 部分
     */
    public function left(){
        return view('admin.left');
    }

    /*
     * 后台 right 部分
     */
    public function right(){
        return view('admin.right');
    }
}