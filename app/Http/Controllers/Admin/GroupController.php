<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Models\Group;
use App\Models\User;
use App\Models\GroupUser;

class GroupController extends Controller
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
        $q = $request->only(
            "name",
            "city"
        );
        $name = isset($q["name"]) ? $q["name"] : '';
        $city = isset($q["city"]) ? $q["city"] : '';

        $groups = Group::when($name,function ($query) use ($name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->when($city,function ($query) use ($city) {
                return $query->where('city', $city);
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
        foreach($groups as $group){
            $group->points = User::where('group_id', $group->id)->sum('points');
            $group->leader = User::where('id', $group->leader_user_id)->first();
            if(!$group->leader->icon){
                $group->leader->icon = 'images/user_icon_default' . $group->leader->sex . '.png';
            }
            $members = GroupUser::where('group_id', $group->id)->where('quit', 0)->get();
            if(count($members)>0){
                foreach($members as $member){
                    if(!$member->user->icon){
                        $member->user->icon = 'images/user_icon_default' . $member->user->sex . '.png';
                    }
                }
                $group->members = $members;
            }
        }


        $city_groups = DB::table('groups')
                     ->select(DB::raw('count(*) as group_count, city'))
                     ->groupBy('city')
                     ->get();

        $page_title = '小组列表';

        return view('admin.group.index', compact(['groups', 'city_groups', 'page_title', 'name', 'city']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Group::findOrFail($id);

        $page_title = '小组详情';

        return view('admin.group.show', compact(['page_title', 'group']));
    }
}
