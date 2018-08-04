<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Storage;
use DB;
use Auth;
use App\Models\User;
use App\Models\Group;
use App\Models\GroupUser;
use App\Models\PointRecord;
use Excel;

class UserController extends Controller
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
            "wwid",
            "city"
        );
        $name = isset($q["name"]) ? $q["name"] : '';
        $wwid = isset($q["wwid"]) ? $q["wwid"] : '';
        $city = isset($q["city"]) ? $q["city"] : '';

        $users = User::when($name,function ($query) use ($name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->when($wwid,function ($query) use ($wwid) {
                return $query->where('wwid', $wwid);
            })
            ->when($city,function ($query) use ($city) {
                return $query->where('city', $city);
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        $city_users = DB::table('users')
                     ->select(DB::raw('count(*) as user_count, city'))
                     ->groupBy('city')
                     ->get();

        $page_title = '用户列表';

        return view('admin.user.index', compact(['users', 'city_users', 'page_title', 'name', 'wwid', 'city']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        $page_title = '用户详情';

        return view('admin.user.show', compact(['page_title', 'user']));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = '用户管理';

        return view('admin.user.create', compact(['page_title']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'city' => 'required',
            'name' => 'required',
            'wwid' => 'required|unique:users',
        ]);

        $city = $request->input('city');
        $name = $request->input('name');
        $wwid = $request->input('wwid');

        $new_user = new User;
        $new_user->city = $city;
        $new_user->name = $name;
        $new_user->wwid = $wwid;

        $new_user->save();
        return redirect("/admin/user")->with('status', '添加成功！');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $page_title = "用户管理";

        return view('admin.user.edit', compact(['page_title', 'user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $this->validate($request, [
            'city' => 'required',
            'name' => 'required',
            'wwid' => 'required',
        ]);

        $city = $request->input('city');
        $name = $request->input('name');
        $wwid = $request->input('wwid');

        $user->city = $city;
        $user->name = $name;
        $user->wwid = $wwid;


        $user->save();
        return redirect("/admin/user")->with('status', '操作成功！');
    }

    public function import(Request $request)
    {
        $a = User::all();
        if(count($a) > 1){
            echo '已禁止导入<br>';exit;
            //echo '清空数据表<br>';//exit;
            //DB::table('users')->truncate();
            echo '导入最新数据<br>';
        }

        $filePath = 'storage/imports/users.xlsx';

        Excel::load($filePath, function($reader) {
            $datas = $reader->noHeading()->all()->toArray();
            //dump($datas);exit;

            unset($datas[0]);
            $chongfu = [];
            foreach($datas as $key=>$data){
                $city = $data[2];
                $wwid = $data[0];
                $name = $data[1];

                $exist = User::where('wwid', $wwid)->first();


                if($exist){
                    $new = $exist;
                    $tip = '更新';
                    $chongfu[] = $exist->toArray();
                }
                else{
                    if(!$name){
                        continue;
                    }
                    $new = new user();
                    $tip = $key .'、导入';
                }

                $new->city = $city;
                $new->wwid = $wwid;
                $new->name = $name;

                if($new->save()){
                    echo $tip . $name .'完毕<br>';
                }
            }
            dump($chongfu);
        });
        return redirect('admin/user');
    }

    public function pointsRecord(Request $request)
    {
        $q = $request->only(
            "type",
            "wwid"
        );
        $type = isset($q["type"]) ? $q["type"] : '';
        $wwid = isset($q["wwid"]) ? $q["wwid"] : '';

        $records = PointRecord::when($wwid,function ($query) use ($wwid) {
                return $query->where('wwid', $wwid);
            })
            ->when($type,function ($query) use ($type) {
                return $query->where('type', $type);
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        $page_title = "积分记录管理";

        return view('admin.user.points', compact(['page_title', 'records', 'type', 'wwid']));
    }

    /**
     * 启用
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pointRecordEnable($id)
    {
        $record = PointRecord::findOrFail($id);
        $record->enabled = 1;
        $record->save();
        $record->user->points = $record->user->points + $record->point;
        $record->user->save();

        return redirect('/admin/user/point_record')->with('status', '操作成功');
    }

    /**
     * 禁用
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pointRecordDisaable($id)
    {
        $record = PointRecord::findOrFail($id);
        $record->enabled = 0;
        $record->save();
        $record->user->points = $record->user->points - $record->point;
        $record->user->save();

        return redirect('/admin/user/point_record')->with('status', '操作成功');
    }

    public function runwwid()
    {
        $records = PointRecord::all();
        foreach($records as $record){
            $record->wwid = $record->user->wwid;
            $record->save();
        }
        echo 'done';
    }

    public function rungrouptask()
    {
        $type = request()->input('type');
        $score = request()->input('score');
        if(!$type){
            return 'no type';
        }
        if(!$score){
            return 'no score';
        }
        $records = DB::table('point_records')
                             ->select(DB::raw('count(*) as user_count, user_id'))
                             ->where('type', $type)
                             ->where('enabled', 1)
                             ->groupBy('user_id')
                             ->having('user_count', '>', 3)
                             ->get();


        foreach ($records as $key => $record) {

            $user = User::find($record->user_id);
            echo '开始处理用户wwid：'. $user->wwid.',姓名：' . $user->name . '<br>';
            $records = PointRecord::where('user_id', $user->id)->where('type', $type)->where('enabled', 1)->orderBy('id', 'asc')->get();
            foreach($records as $key=>$record){
                if($key >2){
                     echo "处理加分记录ID:".$record->id.',-'.$score;echo '<br>';
                     $record->user->points -= $score;
                     $record->user->save();
                     $record->enabled = 0;
                     $record->save();
                     echo '-----------------------------------------------------------';echo '<br>';
                }
            }
        }
        // $groups = Group::all();

        // foreach($groups as $group){
            // if(count($group->group_users) >= 7){
            //     $exist = PointRecord::where('user_id', $group->leader_user_id)->where('type', 3)->first();
            //     if(!$exist){
            //         score($group->leader_user_id, 3);//组长加分
            //     }

            //     foreach($group->group_users as $group_user){
            //         $exist = PointRecord::where('user_id', $group_user->user_id)->where('type', 3)->first();
            //         if(!$exist){
            //             score($group_user->user_id, 3);//组员加分
            //         }

            //     }
            //    $group->make_task_status = 1;
            //    $group->save();
            // }
        //     $users = User::get(); //有分组的话就加分
        //     if($users){
        //         foreach($users as $user){
        //             if($user->group_id > 0){
        //                 echo $user->id;
        //                 $exist = PointRecord::where('user_id', $user->id)->where('type', 3)->where('enabled', 1)->first();
        //                 if(!$exist){
        //                     score($user->id, 3);//组员加分
        //                     echo 'new add!';
        //                 }else{
        //                     echo 'have added!';
        //                 }
        //             }
        //         }
        //     }
        //     echo '<br>';
        //     $records = PointRecord::where('type', 3)->get();//处理错误加分
        //     foreach($records as $record){
        //         if($record->user->group_id < 1){
        //             echo $record->id;echo '<br>';
        //             $record->user->points -= 3;
        //             $record->user->save();
        //             $record->enabled = 0;
        //             $record->save();
        //         }
        //     }
        // // }
        // echo 'done';exit;
    }
}
