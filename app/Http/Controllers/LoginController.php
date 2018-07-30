<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;
use Validator;
use Crypt;
use Cookie;
use Illuminate\Encryption\Encrypter;
use App\Models\User;
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

        $user = User::select('id', 'name', 'icon', 'wwid', 'sex', 'city')->where('wwid', $wwid)->first();
        if(!$user){
            $msg = Lang::get('tips.no_wwid');
            return err(2, $msg);
        }

        //设置性别
        $user->sex = $sex;
        $user->save();

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
