<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;
use Validator;

class ImageController extends Controller{
    public function upload(){
        // $v = Validator::make(request()->all(), [
        //     'image' => 'required',
        // ]);
        // if($v->fails()){
        //     return err(2, $v->messages()->first());
        // }


        $img = Image::make($_FILES['image']['tmp_name']);
        // $img->fit(300, 200);
        $img->widen(300);
        $path = uniqid() . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $img->save(public_path() . '/uploads/'. $path);
        return ok([
            'path'=> '/uploads/' . $path,
        ]);
    }
}
