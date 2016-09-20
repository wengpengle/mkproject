<?php
/**
 * Created by PhpStorm.
 * User: [翁鹏乐]
 * Date: 2016/9/18
 * Time: 14:17
 */

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Api\API;

class LoginController extends Controller{
    /*
     * 后台登录页面
     */
    public function login(){
        $param = [
            'phone' => '18311002531',
            'password' => '123',
        ];

        #请求接口
        $url = API::getApiUrl('register');

        #返回用户信息
        $api_result = CurlPost( $url , $param);
        debug($api_result);


        return view('admin.login');
    }
}