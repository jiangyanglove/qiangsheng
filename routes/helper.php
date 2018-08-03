<?php

use Illuminate\Encryption\Encrypter;
use App\Models\PointRecord;
use App\Models\User;

function err($code, $msg){
    return [
        "code" => $code,
        "error_msg" => $msg,
        "data" => '',
    ];
}
function ok($data=null){
    return [
        "code" => 0,
        "error" => '',
        "data" => $data,
    ];
}

// return int/false
function isauth(){
    $v = request()->input('authtoken');
    if(!$v){
      $v = Cookie::get('user');
    }

    $Crypt = new Encrypter(config("app.key"), 'AES-256-CBC');
    try{
        $d = $Crypt->decrypt($v);
    }catch(\Exception $e){
        return false;
    }

    if(time() - $d['time'] > 60*60*24*30){
 //       return false;
    }
    if($d['for'] != 'user'){
        return false;
    }
    return $d['data'];
}


// 将字典里值为null的元素清除
function clearNull(&$m){
    foreach($m as $k=>$v){
        if($v === null){
            unset($m[$k]);
        }
    }
}
// 将字典里值为null的元素置换为空字符串
function stringNull(&$m){
    foreach($m as $k=>&$v){
        if($v === null){
            $v = '';
        }
    }
}

// 将字典里值为null的元素清除
function clearNull2(&$m){
    foreach($m as $k=>$v){
        if($v === null || $v === ''){
            unset($m[$k]);
        }
    }
}

function getFullUrl($img, $more = false){
    $return = '';
    if(!$more){
        $return = $img ? env('APP_URL') . $img : '';
    }
    else{
        $imgs = explode(",", $img);
        foreach($imgs as $key=>$img){
            if($key >= 1){
                $return .= ',';
            }
            $return .= env('APP_URL') . $img;
        }
    }
    return $return;
}

//转移到中间件
// function initLang(){
//     $lang = 'en';
//     if(request()->session()->has('lang')){
//         $lang = request()->session()->get('lang');
//     }
//     App::setLocale($lang);
// }
function getLang(){
    $lang = 'zh_cn';
    if(request()->session()->has('lang')){
        $lang = request()->session()->get('lang');
    }
    return $lang;
}

function score($user_id, $type){
    $user = User::findOrFail($user_id);
    //积分类型
    $point_type =  array(
                    1   => array(
                            'point' => 2,
                            'description' => '线下扫码',
                            ),
                    2   => array(
                            'point' => 1,
                            'description' => '每日签到',
                            ),
                    3   => array(
                            'point' => 3,
                            'description' => '8月3日下午6点前完成建组',
                            ),
                    4   => array(
                            'point' => 5,
                            'description' => '参加性格测试',
                            ),
                    5   => array(
                            'point' => 2,
                            'description' => '在活动预览区提问',
                            ),
                    6   => array(
                            'point' => 5,
                            'description' => '上传职业照和生活照',
                            ),
                    7   => array(
                            'point' => 5,
                            'description' => '推荐书籍',
                            ),
                    8   => array(
                            'point' => 3,
                            'description' => '在自由讨论区发布话题',
                            ),
                    9   => array(
                            'point' => 5,
                            'description' => '将未来邮局的内容转发到自由讨论区',
                            ),
    );
    $data = [];
    $data['type'] = $type;
    $data['user_id'] = $user_id;
    $data['point'] = $point_type[$type]['point'];
    $data['description'] = $point_type[$type]['description'];

    if(PointRecord::create($data)){
        $user->points = $user->points + $data['point'];
        $user->save();
    }

    return true;
}
