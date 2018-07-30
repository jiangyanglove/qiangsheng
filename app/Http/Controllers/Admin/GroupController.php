<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Models\Group;

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
