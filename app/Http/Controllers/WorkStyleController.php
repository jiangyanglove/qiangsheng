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
use App\Models\WorkStyle;
use App\Models\WorkStyleComment;
use App\Models\WorkStyleLike;
use App\Models\PointRecord;
use Lang;
use Carbon\Carbon;
class WorkStyleController extends Controller
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
            $work_styles = WorkStyle::where('enabled', 1)->orderBy('id', 'desc')->get();
        }
        if($type == 'hot'){
            $work_styles = WorkStyle::where('enabled', 1)->orderBy('likes', 'desc')->orderBy('id', 'desc')->get();
        }
        if(count($work_styles) > 0){
            foreach($work_styles as $work_style){
                if(!$work_style->user->icon){
                    $work_style->user->icon = 'images/user_icon_default' . $work_style->user->sex . '.png';
                }

                $photo_number = 0;
                $real_photos = [];
                if($work_style->photos){
                    $work_style->photos = getFullUrl($work_style->photos, true);
                    $real_photos = explode(",", $work_style->photos);
                    $photo_number = count($real_photos);
                }

                $work_style->photo_number = $photo_number;
                $work_style->real_photos = $real_photos;
                $comments = WorkStyleComment::where('work_style_id', $work_style->id)->where('enabled', 1)->orderBy('id', 'desc')->get();
                if(count($comments) > 0){
                    foreach($comments as $comment){
                        if(!$comment->user->icon){
                            $comment->user->icon = 'images/user_icon_default' . $comment->user->sex . '.png';
                        }
                        $time = Carbon::parse($comment->created_at);
                        $comment->time = $time->diffForHumans();
                        $parent_user_name = '';
                        if($comment->parent > 0){
                            $parent_comment = WorkStyleComment::findOrFail($comment->parent);
                            if($parent_comment){
                                $parent_comment_user = User::findOrFail($parent_comment->user_id);
                                $parent_user_name = $parent_comment_user->name;
                            }
                        }
                        $comment->parent_user_name = $parent_user_name;
                    }
                }
                $work_style->commentsList = $comments;
                $time2 = Carbon::parse($work_style->created_at);
                $work_style->time = $time2->diffForHumans();
            }
        }
        $lang = getLang();
        return view('work_style/index', ['lang' => $lang, 'type' => $type, 'user' => $user, 'work_styles' => $work_styles]);
    }
    public function addPage(){
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
        return view('work_style/add', ['lang' => $lang, 'user' => $user]);
    }

   public function add()
    {
        $id = isauth();
        if(!$id){
            $msg = Lang::get('tips.no_login');
            return err(2, $msg);
        }
        $v = Validator::make(request()->all(), [
            'photos' => 'required',
            'content' => 'required',
        ]);
        if($v->fails()){
            return err(1, $v->messages()->first());
        }
        $data = request()->only('photos', 'content');
        $photos = $data['photos'];
        $content = $data['content'];
        $user = User::findOrFail($id);

        $new_work_style = new WorkStyle();
        $new_work_style->user_id = $id;
        $new_work_style->content = $content;
        $new_work_style->photos = $photos;
        $new_work_style->save();
        $work_style = WorkStyle::find($new_work_style->id);

        //加积分

        $exist = PointRecord::where('user_id', $user->id)->where('type', 6)->where('enabled', 1)->count();
        if(!$exist){
            score($user->id, 6);
        }

        return ok($work_style);
    }
    public function likeAdd(){
        $id = isauth();
        if(!$id){
            $msg = Lang::get('tips.no_login');
            return err(2, $msg);
        }
        $v = Validator::make(request()->all(), [
            'work_style_id' => 'required'
        ]);
        if($v->fails()){
            return err(1, $v->messages()->first());
        }
        $data = request()->only('work_style_id');
        $work_style_id = $data['work_style_id'];
        $work_style = WorkStyle::find($work_style_id);
        if(!$work_style){
            return err(2, 'no this work_style');
        }
        $liked = WorkStyleLike::where('work_style_id', $work_style_id)->where('user_id', $id)->first();
        if(!$liked){
            $new_like = new WorkStyleLike;
            $new_like->user_id = $id;
            $new_like->work_style_id = $work_style_id;
            $new_like->save();
            $work_style->likes += 1;
            $work_style->save();
        }
        $work_style = WorkStyle::find($work_style_id);
        unset(
            $work_style->user_id,
            $work_style->photos,
            $work_style->content,
            $work_style->comments,
            $work_style->enabled,
            $work_style->created_at,
            $work_style->updated_at
        );
        return ok([
            'work_style' => $work_style
        ]);
    }
    public function commentAdd(){
        $id = isauth();
        if(!$id){
            $msg = Lang::get('tips.no_login');
            return err(2, $msg);
        }
        $v = Validator::make(request()->all(), [
            'work_style_id' => 'required',
            'content' => 'required',
            'parent' => 'sometimes'
        ]);
        if($v->fails()){
            return err(1, $v->messages()->first());
        }
        $data = request()->only('work_style_id', 'content', 'parent');
        $work_style_id = $data['work_style_id'];
        $content = $data['content'];
        $work_style = WorkStyle::find($work_style_id);
        $new_comment = new WorkStyleComment;
        $new_comment->user_id = $id;
        $new_comment->work_style_id = $work_style_id;
        $new_comment->content = $content;
        if(isset($data['parent']) && $data['parent'] > 0){
            $parent_comment = WorkStyleComment::findOrFail($data['parent']);
            $new_comment->parent = $data['parent'];
        }
        $new_comment->save();
        $work_style->comments += 1;
        $work_style->save();
        $work_style = WorkStyle::find($work_style_id);
        unset(
            $work_style->user_id,
            $work_style->photos,
            $work_style->content,
            $work_style->likes,
            $work_style->enabled,
            $work_style->created_at,
            $work_style->updated_at
        );
        return ok([
            'work_style' => $work_style
        ]);
    }
}