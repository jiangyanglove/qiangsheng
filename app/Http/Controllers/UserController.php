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

        $group_name = request()->input("group_name");

        $exist = Group::where('name', $group_name)->first();
        if($exist){
            $msg = Lang::get('tips.group_exist');
            return err(2, $msg);
        }
        //todo 限制逻辑
        $new_group = new Group();
        $new_group->name = $group_name;
        $new_group->city = $user->city;
        $new_group->leader_user_id = $user->id;
        $new_group->save();

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

        $group_id = request()->input("group_id");
        $group = Group::findOrFail($group_id);


        //todo

        return ok([
            'group' => $new_group
        ]);
    }
}
