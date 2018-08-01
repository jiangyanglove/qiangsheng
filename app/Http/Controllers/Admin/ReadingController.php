<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Models\User;
use App\Models\Reading;
use App\Models\ReadingComment;
use App\Models\ReadingLike;

class ReadingController extends Controller
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
        $readings = Reading::orderBy('id', 'desc')->paginate(10);

        $page_title = '推荐书籍列表';

        return view('admin.reading.index', compact(['readings', 'page_title']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reading = Reading::findOrFail($id);

        $page_title = '书籍详情';

        return view('admin.reading.show', compact(['page_title', 'reading']));
    }

    /**
     * 启用
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function enable($id)
    {
        $reading = Reading::findOrFail($id);
        $reading->enabled = 1;
        $reading->save();

        return redirect('/admin/reading')->with('status', '操作成功');
    }

    /**
     * 禁用
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function disable($id)
    {
        $reading = Reading::findOrFail($id);
        $reading->enabled = 0;
        $reading->save();

        return redirect('/admin/reading')->with('status', '操作成功');
    }
}
