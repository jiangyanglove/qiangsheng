<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require app_path() . '/../routes/helper.php';
require app_path() . '/../routes/api.php';

Route::get('/', 'HomeController@index')->name('home');
Route::get('/offline', 'HomeController@offline')->name('offline');
Route::get('/offline/ok', 'HomeController@offlineOk');
Route::get('/login', 'HomeController@login')->name('login');
Route::get('/logout', 'LoginController@logout');
Route::get('/group/points/list', 'GroupController@groupPointsList');
Route::get('/group/member/points/list', 'GroupController@memberPointsList');
Route::get('/group/add', 'GroupController@add');
Route::get('/group/mine', 'GroupController@mine');
Route::get('/group/quit', 'GroupController@quit');
Route::get('/group/{city?}', 'GroupController@index');

Route::get('/preview/{week?}', 'HomeController@preview');

Route::get('/reading/add', 'ReadingController@add');
Route::get('/reading/{type?}', 'ReadingController@index');



//Auth::routes();

Route::group(['prefix' => 'admin','namespace' => 'Admin'], function ($router)
{
    Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('admin.logout');

    //首页
    Route::get('/', 'UserController@index')->name('admin.home');


    Route::get('user/import', 'UserController@import');
    Route::get('user', 'UserController@index');
    Route::get('user/show/{id}', 'UserController@show');

    Route::get('group', 'GroupController@index');

    Route::get('weeknotice/{weeknotice}/enable', 'WeeknoticeController@enable');
    Route::get('weeknotice/{weeknotice}/disable', 'WeeknoticeController@disable');
    Route::resource('weeknotice', 'WeeknoticeController');

    Route::get('reading/{reading}/enable', 'ReadingController@enable');
    Route::get('reading/{reading}/disable', 'ReadingController@disable');
    Route::resource('reading', 'ReadingController');
});
