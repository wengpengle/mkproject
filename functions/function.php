<?php
/**
 * Created by PhpStorm.
 * User: [翁鹏乐]
 * Date: 2016/9/20
 * Time: 10:24
 */

/**
 *  自定义打印函数
 */
function debug($val,$dump = false, $exit = true){
    //自动获取调试函数名称
    if( $dump ){
        $func = 'var_dump';
    }else{
        $func = ( is_array($val) || is_object($val) ) ? 'print_r' : 'print_r';
    }

    //输出到html页面
    header('content-type:text/html;charset=UTF-8');

    echo '<pre> debug output:<hr/>';
    $func($val);
    echo '</pre>';

    if($exit) exit();
}


/**
 * CurlPost 方法
 * 用于请求外部接口
 * @param $url 请求的路径
 * @param $data 请求的参数
 * @param $timeout
 */
function CurlPost($url, $param = null, $timeout = 10){
    #初始化curl
    $curl = curl_init();
    #设置请求的路径
    curl_setopt($curl, CURLOPT_URL, $url);
    #设置POST提交
    curl_setopt($curl, CURLOPT_POST, 1);
    #显示输出结果
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);

    #提交数据
    if (is_array($param)) {
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($param));
    } else {
        curl_setopt($curl, CURLOPT_POSTFIELDS, $param);
    }

    #执行请求
    $data = $data_str = curl_exec($curl);

    #处理错误
    if ($error = curl_error($curl)) {
        $logdata = array(
            'url' => $url,
            'param' => $param,
            'error' => '<span style="color:red;font-weight: bold">' . $error . '</span>',
        );

        var_dump($logdata);exit;
    }

    curl_close($curl);

    #json数据转换为数组
    $data = json_decode($data, true);

    if (!is_array($data)) {
        $data = $data_str;
    }

    return $data;
}

/**
 * 用于上传图片
 * @param $file 文件
 */
function uploadImg( $file ){

    if($file -> isValid()){
        #上传文件的后缀.
        $prefix = $file->getClientOriginalExtension();
        #判断上传文件类型
        $file_type = array('jpg','jpeg','png','gif','bmp');
        if(!in_array($prefix,$file_type)){
            #失败返回错误信息
            $imgPath['status'] = '1';
        }

        #文件上传的路径
        $pathImg = 'uploads/course/img/' . date('Y') . '/' . date('m') . '/' . date('d') . '/';
        if (!file_exists($pathImg)) {
            mkdir($pathImg, 0777, true);
        }

        #文件名称
        $fileName = date('YmdHis').'_'.mt_rand(1,9999).'img'.'.'.$prefix;

        #移动文件
        $file->move($pathImg, $fileName);

        #文件新的路径
        $imgPath['path'] = $pathImg.$fileName;

        return $imgPath;
    }

}

/**
 * 用于上传视频
 * @param $file 文件
 */

function uploadVideo( $file ){

    #上传文件的后缀.
    $prefix_video = $file -> getClientOriginalExtension();
    #判断文件上传类型
    $video_type = array('rmvb','mp4','mp3','flv','mkv');
    if(!in_array($prefix_video,$video_type)){
        #失败返回
        $videoPath['status'] = '1';
    }
    #文件上传的路径
    $pathVideo = 'uploads/course/video/' . date('Y') . '/' . date('m') . '/' . date('d') . '/';
    if (!file_exists($pathVideo)) {
        mkdir($pathVideo, 0777, true);
    }
    #文件名称
    $fileNameVideo = date('YmdHis').'_'.mt_rand(1,9999).'video'.'.'.$prefix_video;
    #移动文件
    $file -> move($pathVideo, $fileNameVideo);
    #文件新的路径
    $videoPath['path'] = $pathVideo.$fileNameVideo;

    return $videoPath;
}