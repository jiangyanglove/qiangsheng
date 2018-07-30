<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Storage;
use DB;
use Auth;
use App\Models\Weeknotice;

class WeeknoticeController extends Controller
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
    public function index()
    {
        $weeknotices = Weeknotice::paginate(10);
        $page_title = '精彩预告管理';

        return view('admin.weeknotice.index', compact(['weeknotices', 'page_title']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = '精彩预告管理';

        return view('admin.weeknotice.create', compact(['page_title']));
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
            'week' => 'required',
            'name' => 'required|min:2',
            'name_en' => 'required|min:2',
            'content' => 'sometimes',
            'content_en' => 'sometimes',
            'start_date' => 'required',
        ]);

        $week = $request->input('week');
        $name = $request->input('name');
        $name_en = $request->input('name_en');
        $content = $request->input('content');
        $content_en = $request->input('content_en');
        $start_date = $request->input('start_date');

        $new_weeknotice = new Weeknotice;
        $new_weeknotice->week = $week;
        $new_weeknotice->name = $name;
        $new_weeknotice->name_en = $name_en;
        $new_weeknotice->start_date = $start_date;

        if($content){
            $new_weeknotice->content = $content;
        }

        if($content_en){
            $new_weeknotice->content_en = $content_en;
        }


        $new_weeknotice->save();
        return redirect("/admin/weeknotice");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $weeknotice = Weeknotice::findOrFail($id);
        $page_title = "精彩预告管理";

        return view('admin.weeknotice.edit', compact(['page_title', 'weeknotice']));
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
        $weeknotice = Weeknotice::findOrFail($id);
        $this->validate($request, [
            'week' => 'required',
            'name' => 'required|min:2',
            'name_en' => 'required|min:2',
            'content' => 'sometimes',
            'content_en' => 'sometimes',
            'start_date' => 'required',
        ]);

        $week = $request->input('week');
        $name = $request->input('name');
        $name_en = $request->input('name_en');
        $content = $request->input('content');
        $content_en = $request->input('content_en');
        $start_date = $request->input('start_date');

        $weeknotice->week = $week;
        $weeknotice->name = $name;
        $weeknotice->name_en = $name_en;
        $weeknotice->content = $content;
        $weeknotice->content_en = $content_en;
        $weeknotice->start_date = $start_date;

        $weeknotice->save();
        return redirect("/admin/weeknotice");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $weeknotice = Weeknotice::findOrFail($id);
        $weeknotice->delete();
        $weeknotice->save();

        return redirect('/admin/weeknotice')->with('status', '删除成功！');
    }

    public function is_top($id)//置顶当做new
    {
        $weeknotice = Weeknotice::findOrFail($id);
        if($weeknotice->is_top){
           $weeknotice->is_top = 0;
        }
        else{
            $weeknotice->is_top = 1;
        }

        $weeknotice->save();

        return redirect('/admin/weeknotice')->with('status', '操作成功');
    }
}
