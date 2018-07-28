<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
//修改语言
Route::get('/api/change/language', 'HomeController@apiChangeLanguage');

//上传图片
Route::post("/api/image/upload", "ImageController@upload");

//登录
Route::get('/api/login', 'LoginController@index');
