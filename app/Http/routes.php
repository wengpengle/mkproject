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
	#添加课程体系
	Route::any('raises_class_one_add','RaisesController@raises_class_one_add');
	#课程体系列表
	Route::any('raises_class_one_list','RaisesController@raises_class_one_list');
	#添加课程方向
	Route::any('raises_class_two_add','RaisesController@raises_class_two_add');
	#课程方向列表
	Route::any('raises_class_two_list','RaisesController@raises_class_two_list');


    #后台 新增课程章节
    Route::any('part','PartController@part');
    #后台 课程章节列表
    Route::any('part_list','PartController@part_list');


    ####################################################################
    #                           实战课程模块                             #
    #实战课程 新增实战课程
    Route::any('actual','ActualController@index');
    #新增实战课程
    Route::any('add_actual','ActualController@add_actual');
    #实战课程列表
    Route::any('actual_lists','ActualController@actual_lists');
    Route::any('actual_up','ActualController@actual_up');
    Route::any('actual_del','ActualController@actual_del');

    #实战课程 新增课程章节
    Route::any('part_info','ActualController@part_info');
    Route::any('add_part','ActualController@add_part');
    Route::any('part_lists','ActualController@part_lists');
    Route::any('part_up','ActualController@part_up');
});


#后台登录页
Route::any('admin/login','Admin\LoginController@login');

