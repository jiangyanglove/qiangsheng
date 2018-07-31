<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;
use Validator;
use auth;
use DB;
use Storage;
use Lang;
use App\Models\User;
use App\Models\Group;
use App\Models\GroupUser;
use App\Models\QiandaoLog;
use App\Models\Weeknotice;
use App\Models\Weekfaq;
use App\Models\Reading;

use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function makeGroup()
    {
        $v = Validator::make(request()->all(), [
            'group_name' => 'required',
        ]);
        if($v->fails()){
            return err(2, $v->messages()->first());
        }

        $id = isauth();
        if(!$id){
            $msg = Lang::get('tips.no_login');
            return err(2, $msg);
        }
        $user = User::findOrFail($id);

        if($user->group_id > 0){//已在分组中
        	$msg = Lang::get('tips.you_has_group');
        	return err(2, $msg);
        }

        $group_name = request()->input("group_name");

        $exist = Group::where('name', $group_name)->first();//组名已存在
        if($exist){
            $msg = Lang::get('tips.group_exist');
            return err(2, $msg);
        }

        $new_group = new Group();
        $new_group->name = $group_name;
        $new_group->city = $user->city;
        $new_group->leader_user_id = $user->id;
        $new_group->save();

        $user->group_id = $new_group->id;
        $user->save();

        return ok([
            'group' => $new_group
        ]);
    }

    public function joinGroup()
    {
        $v = Validator::make(request()->all(), [
            'group_id' => 'required',
        ]);
        if($v->fails()){
            return err(2, $v->messages()->first());
        }

        $id = isauth();
        if(!$id){
            $msg = Lang::get('tips.no_login');
            return err(2, $msg);
        }
        $user = User::findOrFail($id);

        if($user->group_id > 0){//已在分组中
        	$msg = Lang::get('tips.in_one_group');
        	return err(2, $msg);
        }

        $group_id = request()->input("group_id");
        $group = Group::findOrFail($group_id);

        $usersCount = GroupUser::where('group_id', $group_id)->where('quit', 0)->count();
        if($usersCount >=7){
        	$msg = Lang::get('tips.full_member');
        	return err(2, $msg);
        }

        $newGroupUser = new GroupUser();
        $newGroupUser->group_id = $group_id;
        $newGroupUser->user_id = $id;
        $newGroupUser->user_name = $user->name;
        $newGroupUser->save();

        $user->group_id = $group_id;
        $user->save();

        return ok();
    }

    public function quitGroup()
    {
        $v = Validator::make(request()->all(), [
            'group_id' => 'required',
        ]);
        if($v->fails()){
            return err(2, $v->messages()->first());
        }

        $id = isauth();
        if(!$id){
            $msg = Lang::get('tips.no_login');
            return err(2, $msg);
        }
        $user = User::findOrFail($id);
        $group_id = request()->input("group_id");
        $group = Group::findOrFail($group_id);
        if($user->group_id != $group_id){//不在分组中
        	$msg = Lang::get('tips.not_in_this_group');
        	return err(2, $msg);
        }

        $leader_user_id = $group->leader_user_id;
        if($id == $leader_user_id){//组长不可退出
        	$msg = Lang::get('tips.leader_can_not_quit');
        	return err(2, $msg);
        }

        $usersCount = GroupUser::where('group_id', $group_id)->where('quit', 0)->count();
        if($usersCount >= 7){
        	$msg = Lang::get('tips.full_member');
        	return err(2, $msg);
        }

		$group_user = GroupUser::where('group_id', $group_id)->where('user_id', $id)->where('quit', 0)->first();
		if(!$group_user){
        	$msg = Lang::get('tips.group_user_data_error');
        	return err(2, $msg);
		}
		$group_user->quit = 1;
		$group_user->save();

        $user->group_id = 0;
        $user->save();

        return ok();
    }

    public function searchGroup()
    {
        $v = Validator::make(request()->all(), [
            'group_name' => 'required',
        ]);
        if($v->fails()){
            return err(2, $v->messages()->first());
        }

        $id = isauth();
        if(!$id){
            $msg = Lang::get('tips.no_login');
            return err(2, $msg);
        }

        $group_name = request()->input("group_name");

        $group = Group::where('name', $group_name)->first();

        if($group){
            unset(
                $group->created_at,
                $group->updated_at
            );
            $points = User::where('group_id', $group->id)->sum('points');
            $group->points = $points;

            $leader_user = User::where('id', $group->leader_user_id)->first();
            //leader
            $group->leader_name = $leader_user->name;

            $members = GroupUser::where('group_id', $group->id)->where('quit', 0)->get();
            foreach($members as $member){
                unset(
                    $member->quit,
                    $member->created_at,
                    $member->updated_at
                );
            }
            $group->members = $members;
        }
        return ok([
            'group' => $group
        ]);
    }

    public function qiandao()
    {
        $id = isauth();
        if(!$id){
            $msg = Lang::get('tips.no_login');
            return err(2, $msg);
        }
        $user = User::findOrFail($id);

        $today = Carbon::now()->toDateString();

        $exist = QiandaoLog::where('user_id', $id)->where('date', $today)->first();
        if($exist){
            $msg = Lang::get('tips.today_has_qiandao');
            return err(2, $msg);
        }

        $new_qiandaolog = new QiandaoLog();
        $new_qiandaolog->user_id = $id;
        $new_qiandaolog->date = $today;
        $new_qiandaolog->save();

        //每日签到加积分
        score($user->id, 2);
        return ok();
    }

    // icon,name
    public function updateUser(){
        $id = isauth();
        if(!$id){
            $msg = Lang::get('tips.no_login');
            return err(2, $msg);
        }

        $v = Validator::make(request()->all(), [
            'name' => 'sometimes',
            'icon' => 'sometimes',
        ]);
        if($v->fails()){
            return err(1, $v->messages()->first());
        }

        $data = request()->only('name', 'icon');
        clearNull($data);

        $user = User::findOrFail($id);
        if(isset($data['name']) && $data['name']){
           $user->name = $data['name'];
           $user->save();
        }
        if(isset($data['icon']) && $data['icon']){
           $user->icon = $data['icon'];
           $user->save();
        }
        if(!$user->icon){
            $user->icon = 'images/user_icon_default' . $user->sex . '.png';
        }
        unset(
            $user->created_at,
            $user->updated_at
        )        ;
        return ok($user);
    }

    public function ask()
    {
        $id = isauth();
        if(!$id){
            $msg = Lang::get('tips.no_login');
            return err(2, $msg);
        }

        $v = Validator::make(request()->all(), [
            'weeknotice_id' => 'required',
            'content' => 'required',
        ]);
        if($v->fails()){
            return err(1, $v->messages()->first());
        }
        $data = request()->only('weeknotice_id', 'content');
        $user = User::findOrFail($id);
        $weeknotice = Weeknotice::findOrFail($data['weeknotice_id']);

        $new_weekfaq = new Weekfaq();
        $new_weekfaq->user_id = $id;
        $new_weekfaq->weeknotice_id = $data['weeknotice_id'];
        $new_weekfaq->week = $weeknotice->week;
        $new_weekfaq->content = $data['content'];
        $new_weekfaq->save();

        //加积分
        score($user->id, 5);
        return ok($new_weekfaq);
    }

    public function addReading()
    {
        $id = isauth();
        if(!$id){
            $msg = Lang::get('tips.no_login');
            return err(2, $msg);
        }

        $v = Validator::make(request()->all(), [
            'icon' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);
        if($v->fails()){
            return err(1, $v->messages()->first());
        }
        $data = request()->only('icon', 'name', 'description');
        $user = User::findOrFail($id);

        $new_Reading = new Reading();
        $new_Reading->user_id = $id;
        $new_Reading->icon = $data['icon'];
        $new_Reading->name = $data['name'];
        $new_Reading->description = $data['description'];
        $new_Reading->save();

        $reading = Reading::find($new_Reading->id);

        //加积分
        score($user->id, 7);
        return ok($reading);
    }
}
