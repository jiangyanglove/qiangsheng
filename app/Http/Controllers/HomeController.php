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
        $from = request()->input("from");//线下扫码
        if($from == 'offline'){
            request()->session()->put('from', $from);
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

        $weeknotices = Weeknotice::where('week', $week)->get();
        foreach($weeknotices as $weeknotice){
            $weeknotice->icon = getFullUrl($weeknotice->icon);
        }

        $weekfaqs = Weekfaq::where('week', $week)->get();
        foreach($weekfaqs as $weekfaq){
            if(!$weekfaq->user->icon){
                $weekfaq->user->icon = 'images/user_icon_default' . $user->sex . '.png';
            }
        }

        return view('preview', ['week' => $week, 'user' => $user, 'weeknotices' => $weeknotices, 'weekfaqs' => $weekfaqs]);
    }
}
