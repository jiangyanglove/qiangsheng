<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;
use Validator;
use Crypt;
use Cookie;
use Illuminate\Encryption\Encrypter;
use App\Models\User;
use App\Models\PointRecord;
use Lang;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    // wwid,password
    public function index(){
        $id = isauth();
        if($id){
            $msg = Lang::get('tips.repeat_login');
            return err(2, $msg);
        }

        $v = Validator::make(request()->all(), [
            'wwid' => 'required',
            'sex' => 'required',
        ]);
        if($v->fails()){
            return err(2, $v->messages()->first());
        }

        $wwid = request()->input("wwid");
        $sex = request()->input("sex");

        $user = User::select('id', 'name', 'icon', 'wwid', 'sex', 'city', 'logins')->where('wwid', $wwid)->first();
        if(!$user){
            $msg = Lang::get('tips.no_wwid');
            return err(2, $msg);
        }

        //如果是线下扫码，增加相应积分
        // if(request()->session()->has('from') && request()->session()->get('from') == 'offline'){

        //     $exist = PointRecord::where('user_id', $user->id)->where('type', 1)->first();
        //     if(!$exist){
        //         score($user->id, 1);
        //     }
        // }

        //设置性别
        $user->sex = $sex;
        $user->logins = $user->logins + 1;
        $user->last_login_at = date('Y-m-d H:i:s');
        $user->save();
        $user->icon = getFullUrl($user->icon);

        $authtoken = Crypt::encrypt([
            'time' => time(),
            'for' => 'user',
            'data' => $user->id,
        ]);
        return response([
            "code" => 0,
            "error" => "",
            "data" => [
                "user" => $user,
                "authtoken" => $authtoken,
            ],
        ])->withCookie(cookie("user", $authtoken, 60*24*30));
    }

    public function logout(){
        return redirect()->route('home')->withCookie(cookie("user", null));
    }
}
