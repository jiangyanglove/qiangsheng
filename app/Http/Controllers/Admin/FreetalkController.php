<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Models\User;
use App\Models\Freetalk;
use App\Models\FreetalkComment;
use App\Models\FreetalkLike;

class FreetalkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $freetalks = Freetalk::orderBy('id', 'desc')->paginate(10);
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
                $freetalk->photo_number = $photo_number;
                $freetalk->real_photos = $real_photos;
                // $comments = FreetalkComment::where('freetalk_id', $freetalk->id)->where('enabled', 1)->orderBy('id', 'desc')->get();
                // if(count($comments) > 0){
                //     foreach($comments as $comment){
                //         if(!$comment->user->icon){
                //             $comment->user->icon = 'images/user_icon_default' . $comment->user->sex . '.png';
                //         }
                //         $time = Carbon::parse($comment->created_at);
                //         $comment->time = $time->diffForHumans();
                //         $parent_user_name = '';
                //         if($comment->parent > 0){
                //             $parent_comment = FreetalkComment::findOrFail($comment->parent);
                //             if($parent_comment){
                //                 $parent_comment_user = User::findOrFail($parent_comment->user_id);
                //                 $parent_user_name = $parent_comment_user->name;
                //             }
                //         }
                //         $comment->parent_user_name = $parent_user_name;
                //     }
                // }
                // $freetalk->commentsList = $comments;
            }
        }

        $page_title = '自由讨论主题列表';

        return view('admin.freetalk.index', compact(['freetalks', 'page_title']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $freetalk = Freetalk::findOrFail($id);

        $page_title = '自由讨论主题详情';

        return view('admin.freetalk.show', compact(['page_title', 'freetalk']));
    }

    /**
     * 启用
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function enable($id)
    {
        $freetalk = Freetalk::findOrFail($id);
        $freetalk->enabled = 1;
        $freetalk->save();

        return redirect('/admin/freetalk')->with('status', '操作成功');
    }

    /**
     * 禁用
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function disable($id)
    {
        $freetalk = Freetalk::findOrFail($id);
        $freetalk->enabled = 0;
        $freetalk->save();

        return redirect('/admin/freetalk')->with('status', '操作成功');
    }
}
