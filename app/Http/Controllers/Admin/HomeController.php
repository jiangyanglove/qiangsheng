<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use DB;
use Carbon\Carbon;
use App\Models\AccessLog;
use App\Models\Userinfo;

use Entrust;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth.admin:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$page_title = '首页';
		return view('admin.index', ['page_title' => $page_title]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getApi(Request $request)
    {
		$days = $request->input('days', 7);
		$range = Carbon::now()->subDays($days);

		$stats = AccessLog::where('created_at', '>=', $range)
							->groupBy('date')
							->orderBy('date', 'asc')
							->get([
									DB::raw('Date(created_at) as date'),
									DB::raw('COUNT(*) as value')
							])
							->toJSON();
		return $stats;
    }
}
