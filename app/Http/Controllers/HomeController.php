<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;
use Validator;
use auth;
use DB;
use Crypt;
use Cookie;
use Illuminate\Encryption\Encrypter;
use App\Models\User;
use App\Models\Weeknotice;
use App\Models\Weekfaq;
use App\Models\PointRecord;
use Lang;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!request()->session()->get('clean') && request()->session()->get('clean') != 'ok'){
            request()->session()->put('clean', 'ok');
            return redirect()->route('home')->withCookie(cookie("user", null));
        }


        $user = '';
        $id = isauth();
        if(!$id){
            return redirect()->route('login');
        }
        $user = User::findOrFail($id);
        if(!$user->icon){
            $user->icon = 'images/user_icon_default' . $user->sex . '.png';
        }

        $lang = getLang();
        return view('index', ['lang' => $lang, 'user' => $user]);
    }

    public function offline(){
        return view('offline/index');

    }
    public function offlineOk(){
        return view('offline/ok');

    }
    public function apiOfflineOk(){
        $v = Validator::make(request()->all(), [
            'wwid' => 'required',
        ]);
        if($v->fails()){
            return err(1, $v->messages()->first());
        }
        $data = request()->only('wwid');


        $user = User::select('id', 'wwid')->where('wwid', $data['wwid'])->first();
        if(!$user){
            $msg = Lang::get('tips.no_wwid');
            return err(2, $msg);
        }

        //如果是线下扫码，增加相应积分


        $exist = PointRecord::where('user_id', $user->id)->where('type', 1)->first();
        if($exist){
            $msg = Lang::get('tips.has_got_this_type_point');
            return err(2, $msg);
        }
        score($user->id, 1);
        return ok();
    }

    public function login()
    {
        $id = isauth();
        if($id){
            return redirect()->route('home');
        }
        $lang = getLang();
        return view('login', ['lang' => $lang]);
    }

    public function apiChangeLanguage()
    {
        $lang = request()->input('lang');

        if(!$lang){
            $lang = 'en';
        }

        request()->session()->put('lang', $lang);
        $lang = request()->session()->get('lang');
        return ok();
    }

    public function preview($week = 0){
        if(!$week){
            $week = 1;
        }
        $id = isauth();
        if(!$id){
            $msg = Lang::get('tips.no_login');
            return err(2, $msg);
        }
        $user = User::findOrFail($id);
        if(!$user->icon){
            $user->icon = 'images/user_icon_default' . $user->sex . '.png';
        }

        $weeknotices = Weeknotice::where('week', $week)->where('enabled', 1)->get();
        if(count($weeknotices)>0){
            foreach($weeknotices as $weeknotice){
                $weeknotice->icon = getFullUrl($weeknotice->icon);
                $faqs = Weekfaq::where('weeknotice_id', $weeknotice->id)->where('enabled', 1)->get();
                if(count($faqs) >0 ){
                    foreach($faqs as $weekfaq){
                        if(!$weekfaq->user->icon){
                            $weekfaq->user->icon = 'images/user_icon_default' . $user->sex . '.png';
                        }
                    }
                }
                $weeknotice->faqs = $faqs;
            }
        }
        $lang = getLang();

        return view('preview', ['week' => $week, 'lang' => $lang, 'user' => $user, 'weeknotices' => $weeknotices]);
    }
}
