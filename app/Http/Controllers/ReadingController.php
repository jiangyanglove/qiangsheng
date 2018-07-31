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
use App\Models\Reading;
use Lang;

class ReadingController extends Controller
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
    public function index($type=false)
    {
        $types = array("hot", "new");
        if(!$type || !in_array($type, $types)) {
            $type = 'new';
        }

        if($type == 'new'){
            $readings = Reading::orderBy('id', 'desc')->get();
        }
        if($type == 'hot'){
            $readings = Reading::orderBy('likes', 'desc')->orderBy('id', 'desc')->get();
        }
        if(count($readings) > 0){
            foreach($readings as $reading){
                $reading->user->icon = 'images/user_icon_default' . $reading->user->sex . '.png';
            }
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
        return view('reading/index', ['lang' => $lang, 'type' => $type, 'user' => $user, 'readings' => $readings]);
    }

    public function add(){
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
        return view('reading/add', ['lang' => $lang, 'user' => $user]);

    }
}
