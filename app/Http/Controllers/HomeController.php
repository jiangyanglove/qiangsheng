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
        $user = '';
        $id = isauth();
        if(!$id){
            return redirect()->route('login');
        }
        $user = User::findOrFail($id);
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
}
