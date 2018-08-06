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
use App\Models\Freetalk;
use App\Models\FreetalkComment;
use App\Models\FreetalkLike;
use App\Models\Letter;
use App\Models\Letterplan;
use App\Models\PointRecord;
use Lang;
use Carbon\Carbon;
class FreetalkController extends Controller
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
            $freetalks = Freetalk::where('enabled', 1)->orderBy('id', 'desc')->get();
        }
        if($type == 'hot'){
            $freetalks = Freetalk::where('enabled', 1)->orderBy('likes', 'desc')->orderBy('id', 'desc')->get();
        }
        if(count($freetalks) > 0){
            foreach($freetalks as $freetalk){
                if(!$freetalk->user->icon){
                    $freetalk->user->icon = 'images/user_icon_default' . $freetalk->user->sex . '.png';
                }
                $photo_number = 0;
                $real_photos = [];
                if($freetalk->photos){
                    $freetalk->photos = getFullUrl($freetalk->photos, true);
                    $real_photos = explode(",", $freetalk->photos);
                    $photo_number = count($real_photos);
                    if($photo_number == 1){
                        $real_photos = $freetalk->photos;
                    }
                }

                if($freetalk->letter_id){
                     $freetalk->letter = Letter::find($freetalk->letter_id);

                }

                $freetalk->photo_number = $photo_number;
                $freetalk->real_photos = $real_photos;
                $comments = FreetalkComment::where('freetalk_id', $freetalk->id)->where('enabled', 1)->orderBy('id', 'desc')->get();
                if(count($comments) > 0){
                    foreach($comments as $comment){
                        if(!$comment->user->icon){
                            $comment->user->icon = 'images/user_icon_default' . $comment->user->sex . '.png';
                        }
                        $time = Carbon::parse($comment->created_at);
                        $comment->time = $time->diffForHumans();
                        $parent_user_name = '';
                        if($comment->parent > 0){
                            $parent_comment = FreetalkComment::findOrFail($comment->parent);
                            if($parent_comment){
                                $parent_comment_user = User::findOrFail($parent_comment->user_id);
                                $parent_user_name = $parent_comment_user->name;
                            }
                        }
                        $comment->parent_user_name = $parent_user_name;
                    }
                }
                $freetalk->commentsList = $comments;
                $time2 = Carbon::parse($freetalk->created_at);
                $freetalk->time = $time->diffForHumans();
            }
        }
 //dump($freetalks);exit;
        $lang = getLang();
        return view('freetalk/index', ['lang' => $lang, 'type' => $type, 'user' => $user, 'freetalks' => $freetalks]);
    }
    public function addPhotoPage(){
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
        return view('freetalk/photo', ['lang' => $lang, 'user' => $user]);
    }

    public function addLetterPage(){
        $user = '';
        $id = isauth();
        if(!$id){
            return redirect()->route('login');
        }
        $letter  = Letter::where('user_id', $id)->where('enabled', 1)->first();
        $plans  = LetterPlan::where('user_id', $id)->where('enabled', 1)->get();

        $user = User::findOrFail($id);
        if(!$user->icon){
            $user->icon = 'images/user_icon_default' . $user->sex . '.png';
        }
        $lang = getLang();
        return view('freetalk/letter', ['lang' => $lang, 'user' => $user, 'letter' => $letter, 'plans' => $plans]);
    }

    public function addPlanPage(){
        $user = '';
        $id = isauth();
        if(!$id){
            return redirect()->route('login');
        }
        $user = User::findOrFail($id);
        $letter  = Letter::where('user_id', $id)->where('enabled', 1)->first();
        $plans  = LetterPlan::where('user_id', $id)->where('enabled', 1)->get();
        if(!$user->icon){
            $user->icon = 'images/user_icon_default' . $user->sex . '.png';
        }
        $lang = getLang();
        return view('freetalk/plan', ['lang' => $lang, 'user' => $user, 'letter' => $letter, 'plans' => $plans]);
    }
   public function add()
    {
        $id = isauth();
        if(!$id){
            $msg = Lang::get('tips.no_login');
            return err(2, $msg);
        }
        $v = Validator::make(request()->all(), [
            'type' => 'required',
            'photos' => 'sometimes',
            'content' => 'required',
            'letter_id' => 'sometimes',
        ]);
        if($v->fails()){
            return err(1, $v->messages()->first());
        }
        $data = request()->only('type', 'photos', 'content', 'letter_id');
        $type = $data['type'];
        $content = $data['content'];
        $user = User::findOrFail($id);
        $types = array("photo", "plan");
        if(!in_array($type, $types)) {
            return err(2, 'the type parameter value error');
        }
        if(!isset($data['photos']) && !isset($data['letter_id'])){
            return err(2, 'the photos or letter_id parameter is must.');
        }
        $new_freetalk = new Freetalk();
        $new_freetalk->user_id = $id;
        $new_freetalk->type = $type;
        $new_freetalk->content = $content;
        if(isset($data['photos']) && $data['photos']){
            $new_freetalk->photos = $data['photos'];
        }
        if(isset($data['letter_id']) && $data['letter_id']){
            $new_freetalk->letter_id = $data['letter_id'];
        }
        $new_freetalk->save();
        $freetalk = Freetalk::find($new_freetalk->id);

        //加积分
        if($type == 'plan'){
            $exist = PointRecord::where('user_id', $user->id)->where('type', 9)->where('enabled', 1)->first();
            if(!$exist){
                score($user->id, 9);
            }
        }
        else{
            $record_count = PointRecord::where('user_id', $user->id)->where('type', 8)->where('enabled', 1)->count();
            if($record_count < 3){
                score($user->id, 8);
            }
        }

        return ok($freetalk);
    }
    public function likeAdd(){
        $id = isauth();
        if(!$id){
            $msg = Lang::get('tips.no_login');
            return err(2, $msg);
        }
        $v = Validator::make(request()->all(), [
            'freetalk_id' => 'required'
        ]);
        if($v->fails()){
            return err(1, $v->messages()->first());
        }
        $data = request()->only('freetalk_id');
        $freetalk_id = $data['freetalk_id'];
        $freetalk = Freetalk::find($freetalk_id);
        if(!$freetalk){
            return err(2, 'no this freetalk');
        }
        $liked = FreetalkLike::where('freetalk_id', $freetalk_id)->where('user_id', $id)->first();
        if(!$liked){
            $new_like = new FreetalkLike;
            $new_like->user_id = $id;
            $new_like->freetalk_id = $freetalk_id;
            $new_like->save();
            $freetalk->likes += 1;
            $freetalk->save();
        }
        $freetalk = Freetalk::find($freetalk_id);
        unset(
            $freetalk->user_id,
            $freetalk->type,
            $freetalk->photos,
            $freetalk->content,
            $freetalk->letter_id,
            $freetalk->comments,
            $freetalk->enabled,
            $freetalk->created_at,
            $freetalk->updated_at
        );
        return ok([
            'freetalk' => $freetalk
        ]);
    }
    public function commentAdd(){
        $id = isauth();
        if(!$id){
            $msg = Lang::get('tips.no_login');
            return err(2, $msg);
        }
        $v = Validator::make(request()->all(), [
            'freetalk_id' => 'required',
            'content' => 'required',
            'parent' => 'sometimes'
        ]);
        if($v->fails()){
            return err(1, $v->messages()->first());
        }
        $data = request()->only('freetalk_id', 'content', 'parent');
        $freetalk_id = $data['freetalk_id'];
        $content = $data['content'];
        $freetalk = Freetalk::find($freetalk_id);
        $new_comment = new FreetalkComment;
        $new_comment->user_id = $id;
        $new_comment->freetalk_id = $freetalk_id;
        $new_comment->content = $content;
        if(isset($data['parent']) && $data['parent'] > 0){
            $parent_comment = FreetalkComment::findOrFail($data['parent']);
            $new_comment->parent = $data['parent'];
        }
        $new_comment->save();
        $freetalk->comments += 1;
        $freetalk->save();
        $freetalk = Freetalk::find($freetalk_id);
        unset(
            $freetalk->user_id,
            $freetalk->type,
            $freetalk->photos,
            $freetalk->content,
            $freetalk->letter_id,
            $freetalk->likes,
            $freetalk->enabled,
            $freetalk->created_at,
            $freetalk->updated_at
        );
        return ok([
            'freetalk' => $freetalk
        ]);
    }

    public function getLetters(){
        $id = isauth();
        if(!$id){
            $msg = Lang::get('tips.no_login');
            return err(2, $msg);
        }

        $user = User::findOrFail($id);

        $plans = LetterPlan::where('user_id', $id)->where('enabled', 1)->get();

        return ok($plans);


    }
    public function postLetterAdd()
    {
        //$jsona = '[{"what":"gou","how":"ri","when":"de"},{"what":"gou","how":"ri","when":"de"},{"what":"gou","how":"ri","when":"de"}]';
        $id = isauth();
        if(!$id){
            $msg = Lang::get('tips.no_login');
            return err(2, $msg);
        }

        $exist = Letter::where('user_id', $id)->where('enabled', 1)->first();
        if($exist){
           return err(2, 'you already have a letter.');
        }
        $v = Validator::make(request()->all(), [
            'years' => 'required',
            'content' => 'required',
            'plans' => 'required',
        ]);
        if($v->fails()){
            return err(1, $v->messages()->first());
        }
        $plans = json_decode(request()->input('plans'), true);//多个计划
        $data = request()->only('years', 'content');
        $data['user_id'] = $id;
        $letter = Letter::create($data);//letter

        if($plans){
            foreach($plans as $plan){
                $plan['letter_id'] = $letter->id;
                $plan['user_id'] = $id;
                LetterPlan::create($plan);
            }
        }
        unset($letter->created_at,$letter->updated_at);
        return ok($letter);
    }
}