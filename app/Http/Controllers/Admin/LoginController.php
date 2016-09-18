<?php
/**
 * Created by PhpStorm.
 * User: [翁鹏乐]
 * Date: 2016/9/18
 * Time: 14:17
 */

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

class LoginController extends Controller{
    /*
     * 后台登录页面
     */
    public function login(){
        return view('admin.login');
    }
}