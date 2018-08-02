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

//创建分组
Route::get('/api/group/make', 'UserController@makeGroup');

//加入分组
Route::get('/api/group/join', 'UserController@joinGroup');

//退出分组
Route::get('/api/group/quit', 'UserController@quitGroup');

//按名称搜索
Route::get('/api/group/search', 'UserController@searchGroup');

//签到
Route::get('/api/qiandao', 'UserController@qiandao');

//精彩预告提问
Route::get('/api/ask', 'UserController@ask');

//修改资料
Route::get('/api/user/update', 'UserController@updateUser');

//精彩预告提问
Route::get('/api/offline', 'HomeController@apiOfflineOk');

//添加书籍
Route::get('/api/reading/add', 'UserController@addReading');

//书籍点赞
Route::get('/api/reading/like/add', 'UserController@ReadingLikeAdd');

//书籍评论
Route::get('/api/reading/comment/add', 'UserController@ReadingCommentAdd');

//disctest
Route::get('/api/disc/answer', 'HomeController@ApiDiscTestProcess');

//发布自由讨论
Route::get('/api/freetalk/add', 'FreetalkController@add');

//自由讨论点赞
Route::get('/api/freetalk/like/add', 'FreetalkController@likeAdd');

//自由讨论评论
Route::get('/api/freetalk/comment/add', 'FreetalkController@commentAdd');
