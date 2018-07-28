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
Route::get('/logout', 'LoginController@logout');

Route::get('/user', 'StaffController@user');
Route::get('/stars', 'StarController@index');
Route::get('/api/star/like/add', 'StarController@likeAdd');
Route::get('/map', 'StaffController@map');

Route::get('/api/post/list', 'PostController@getList');
Route::get('/api/post/top5', 'PostController@getTop5');
Route::get('/api/post/detail', 'PostController@getPostByID');
Route::post('/api/post/add', 'PostController@add');
Route::get('/api/post/like/add', 'PostController@likeAdd');
Route::get('/api/post/comment/add', 'PostController@commentAdd');
Route::get('/api/post/comment/list', 'PostController@getCommentList');


Route::post('/api/staff/update', 'StaffController@updateUser');
//Auth::routes();

Route::group(['prefix' => 'admin','namespace' => 'Admin'], function ($router)
{
    Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('admin.logout');

    //首页
    Route::get('/', 'HomeController@index')->name('admin.home');


    Route::get('user/import', 'UserController@import');
    Route::get('user', 'UserController@index');
    Route::get('user/show/{id}', 'UserController@show');

    Route::get('post', 'PostController@index');

    Route::get('star/{star}/enable', 'StarController@enable');
    Route::get('star/{star}/disable', 'StarController@disable');
    Route::get('star/{star}/hot', 'StarController@hot');
    Route::get('star/insert', 'StarController@insert');
    Route::resource('star', 'StarController');
});
