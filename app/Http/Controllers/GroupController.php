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
        $cities = array("北京", "上海", "广州", "西安", "苏州", "杭州", "Beijing", "Shanghai", "Guangzhou", "Xian", "Suzhou", "Hangzhou");
        if(!in_array($city, $cities)) {
            $city = '北京';
        }
        $city = $city;

        $cities_en = array("Beijing", "Shanghai", "Guangzhou", "Xian", "Suzhou", "Hangzhou");
        $city_zh = '';
        if(in_array($city, $cities_en)){
            if($city == 'Beijing'){
               $city_zh =  '北京';
            }
            if($city == 'Shanghai'){
               $city_zh =  '上海';
            }
            if($city == 'Guangzhou'){
               $city_zh =  '广州';
            }
            if($city == 'Xian'){
               $city_zh =  '西安';
            }
            if($city == 'Suzhou'){
               $city_zh =  '苏州';
            }
            if($city == 'Hangzhou'){
               $city_zh =  '杭州';
            }

        }

        $do_number = User::where('group_id', '>', 0)->count();
        $undo_number = User::where('group_id', 0)->count();

        if($city_zh){
            $groups = Group::where('city', $city_zh)->get();
        }
        else{
            $groups = Group::where('city', $city)->get();
        }

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
            if(count($members) > 0){
                $my_group->members = $members;
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

    public function mine(){
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
            if(!$my_group->leader->icon){
                $my_group->leader->icon = 'images/user_icon_default' . $my_group->leader->sex . '.png';
            }
            $members = GroupUser::where('group_id', $my_group->id)->where('quit', 0)->get();
            if(count($members)>0){
                $my_group->members = $members;
                foreach($members as $member){
                    if(!$member->user->icon){
                        $member->user->icon = 'images/user_icon_default' . $member->user->sex . '.png';
                    }
                }
            }
        }

        $do_number = User::where('group_id', '>', 0)->count();
        $undo_number = User::where('group_id', 0)->count();
        return view('group.mine', compact(['user', 'my_group', 'do_number', 'undo_number']));
    }

    public function quit(){
        $user = '';
        $id = isauth();
        if(!$id){
            return redirect()->route('login');
        }

        $user = User::findOrFail($id);
        if(!$user->icon){
            $user->icon = 'images/user_icon_default' . $user->sex . '.png';
        }

        $my_group = GroupUser::where('group_id', $user->group_id)->where('user_id', $id)->first();
        $my_group->quit = 1;
        $my_group->save();

        $user->group_id = 0;
        $user->save();

        return redirect('/group');
    }
}
