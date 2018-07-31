<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;
use Validator;
use auth;
use DB;
use Storage;

use App\Models\User;
use App\Models\Group;
use App\Models\Groupuser;

class GroupController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function index($city = false){
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
        if(!$city){
            $city = '北京';
        }
        $cities = array("北京", "上海", "广州", "西安", "苏州", "杭州");
        if(!in_array($city, $cities)) {
            $city = '北京';
        }
        $city = $city;

        $do_number = User::where('group_id', '>', 0)->count();
        $undo_number = User::where('group_id', 0)->count();

    	$groups = Group::where('city', $city)->get();
        foreach($groups as $group){
            $points = User::where('group_id', $group->id)->sum('points');
            $group->points = $points;
            $members = GroupUser::where('group_id', $group->id)->where('quit', 0)->get();
            $group->members = $members;
        }
    	return view('group.index', compact(['user', 'city', 'do_number', 'undo_number', 'groups']));
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

        $city = $user->city;

        $do_number = User::where('group_id', '>', 0)->count();
        $undo_number = User::where('group_id', 0)->count();

        return view('group.add', compact(['user', 'city', 'do_number', 'undo_number']));
    }

    public function groupPointsList(){
        $user = '';
        $id = isauth();
        if(!$id){
            return redirect()->route('login');
        }
        $user = User::findOrFail($id);
        if(!$user->icon){
            $user->icon = 'images/user_icon_default' . $user->sex . '.png';
        }

        $my_group = Group::where('id', $user->group_id)->first();
        if($my_group){
            $my_group->points = User::where('group_id', $my_group->id)->sum('points');
            $my_group->leader = User::where('id', $my_group->leader_user_id)->first();
            $members = GroupUser::where('group_id', $my_group->id)->where('quit', 0)->get();
            if(count($members)>0){
                $group->members = $members;
            }
        }

        $other_groups = Group::where('id', '<>', $user->group_id)->get();
        if($other_groups){
            foreach($other_groups as $group){
                $group->points = User::where('group_id', $group->id)->sum('points');
                $group->leader = User::where('id', $group->leader_user_id)->first();
                $group->members = GroupUser::where('group_id', $group->id)->where('quit', 0)->get();
            }
        }
        return view('group.points_group', compact(['user', 'my_group', 'other_groups']));
    }

    public function memberPointsList(){
        $user = '';
        $id = isauth();
        if(!$id){
            return redirect()->route('login');
        }

        $user = User::findOrFail($id);
        if(!$user->icon){
            $user->icon = 'images/user_icon_default' . $user->sex . '.png';
        }

        $other_users = User::where('id', '<>', $id)->get();
        foreach($other_users as $u){
            $u->icon = 'images/user_icon_default' . $u->sex . '.png';
        }
        return view('group.points_member', compact(['user', 'other_users']));
    }
}
