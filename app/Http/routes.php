<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group([ 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['web']], function () {
    #后台首页
    Route::any('index','IndexController@index');
    #后台 top
    Route::any('top','IndexController@top');
    #后台 left
    Route::any('left','IndexController@left');
    #后台 right
    Route::any('right','IndexController@right');

    #后台 新增课程
    Route::any('course','CourseController@course');
    #后台 新增课程列表
    Route::any('course_list','CourseController@course_list');

    #后台 新增课程分类
    Route::any('course_type','CourseController@course_type');
    #后台 新增课程分类列表
    Route::any('course_type_list','CourseController@course_type_list');




    /*
	后台 #加薪利器# 模块
 	*/
	#添加课程
	Route::any('raises_add','RaisesController@raises_add');
	#课程列表
	Route::any('raises_list','RaisesController@raises_list');
	#课程类型
	Route::any('raises_type','RaisesController@raises_type');
	#添加课程
	# Route::any('raises_type_list','raisesController@raises_type_list');
	#添加课程体系
	Route::any('raises_class_one_add','RaisesController@raises_class_one_add');
	#添加课程方向
	Route::any('raises_class_two_add','RaisesController@raises_class_two_add');
});


#后台登录页
Route::any('admin/login','Admin\LoginController@login');

