<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Storage;
use DB;
use Auth;
use App\Models\Userinfo;

use App\Models\AccessLog;

class UserinfoController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|min:2|max:10',
            'address' => 'required|min:2|max:50',
            'picture' => 'required',
        ]);

        $username = $request->input('username');
        $address = $request->input('address');
        $file = $request->file('picture');

        $newUserinfo = new Userinfo;
        $newUserinfo->username = $username;
        $newUserinfo->address = $address;

        // 文件是否上传成功
        if($file){
            if ($file->isValid()) {

                // 获取文件相关信息
                $originalName = $file->getClientOriginalName(); // 文件原名
                $ext = $file->getClientOriginalExtension();     // 扩展名
                $realPath = $file->getRealPath();   //临时文件的绝对路径
                $type = $file->getClientMimeType();     // image/jpeg

                // 上传文件
                $filename = 'userinfo/pictures/' . date('YmdHis') . '-' . uniqid() . '.' . $ext;
                $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));
                if($bool){
                    $newUserinfo->picture = $filename;
                }

            }
        }
        $newUserinfo->save();
        return [
            'code' => 0,
            'data' => config('app.url') . '/image/image?avatar=' . $newUserinfo->picture . '&name=' . rawurlencode($newUserinfo->username),
        ];
    }

	public function counter()
	{
		$a = new AccessLog;
		$a->save();
		return $a->id;
	}
}
