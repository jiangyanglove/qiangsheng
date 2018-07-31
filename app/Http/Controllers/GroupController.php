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
        $cities = array("北京", "上海", "广州", "西安", "苏州");
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
            foreach($members as $member){
                $member->user = User::where('id', $member->id)->first();
            }
            $group->members = $members;
        }
    	return view('group.index', compact(['user', 'city', 'do_number', 'undo_number', 'groups']));
    }
}
