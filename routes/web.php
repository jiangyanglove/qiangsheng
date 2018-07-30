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

    Route::get('group', 'GroupController@index');

    Route::resource('weeknotice', 'WeeknoticeController');
});
