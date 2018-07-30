<?php

use Illuminate\Encryption\Encrypter;
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
    $lang = 'en';
    if(request()->session()->has('lang')){
        $lang = request()->session()->get('lang');
    }
    return $lang;
}
