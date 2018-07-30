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

    public function index(){
    	$groups = Group::get();
    	return view('group.index', compact(['users', 'city_users', 'page_title', 'name', 'wwid', 'city']));
    }
}
