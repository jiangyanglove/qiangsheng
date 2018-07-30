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
}
