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
use App\Models\ReadingComment;
use Lang;
use Carbon\Carbon;

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
        $user = '';
        $id = isauth();
        if(!$id){
            return redirect()->route('login');
        }
        $user = User::findOrFail($id);
        if(!$user->icon){
            $user->icon = 'images/user_icon_default' . $user->sex . '.png';
        }

        $types = array("hot", "new");
        if(!$type || !in_array($type, $types)) {
            $type = 'new';
        }

        if($type == 'new'){
            $readings = Reading::where('enabled', 1)->orderBy('id', 'desc')->get();
        }
        if($type == 'hot'){
            $readings = Reading::where('enabled', 1)->orderBy('likes', 'desc')->orderBy('id', 'desc')->get();
        }
        if(count($readings) > 0){
            foreach($readings as $reading){
                if(!$reading->user->icon){
                    $reading->user->icon = 'images/user_icon_default' . $reading->user->sex . '.png';
                }
                $comments = ReadingComment::where('reading_id', $reading->id)->where('enabled', 1)->orderBy('id', 'desc')->get();
                if(count($comments) > 0){
                    foreach($comments as $comment){
                        if(!$comment->user->icon){
                            $comment->user->icon = 'images/user_icon_default' . $comment->user->sex . '.png';
                        }

                        $time = Carbon::parse($comment->created_at);
                        $comment->time = $time->diffForHumans();

                        $parent_user_name = '';
                        if($comment->parent > 0){
                            $parent_comment = ReadingComment::findOrFail($comment->parent);
                            if($parent_comment){
                                $parent_comment_user = User::findOrFail($parent_comment->user_id);
                                $parent_user_name = $parent_comment_user->name;
                            }
                        }
                        $comment->parent_user_name = $parent_user_name;
                    }
                }
                $reading->commentsList = $comments;
            }
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
