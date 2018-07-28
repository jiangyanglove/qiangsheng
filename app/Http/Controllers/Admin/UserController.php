<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Storage;
use DB;
use Auth;
use App\Models\User;
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

        return view('admin.user.show', compact(['page_title', 'user', 'posts']));
    }

    public function import(Request $request)
    {
        $a = User::all();
        if(count($a) > 1){
            //echo '已禁止导入<br>';exit;
            echo '清空数据表<br>';//exit;
            DB::table('users')->truncate();
            echo '导入最新数据<br>';
        }

        $filePath = 'storage/imports/users.xlsx';

        Excel::load($filePath, function($reader) {
            $datas = $reader->noHeading()->all()->toArray();
            //dump($datas);exit;

            unset($datas[0]);
            $chongfu = [];
            foreach($datas as $key=>$data){
                $city = $data[0];
                $wwid = $data[1];
                $name = $data[2];

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
    }
}
