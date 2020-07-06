<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\image;
use Intervention\Image\ImageManagerStatic as images;

class imageController extends Controller
{
    public function index()
    {
        $image = image::whereId('1')->first();
        return view('image',compact('image'));
    }

    public function post(Request $req)
    {
        $image = $req->file('image');
        $fileName = $image->getClientOriginalName();
        Images::make($image)->resize(200,200)->save('image'.$fileName);
        $save = new image;
        $save->image = $fileName;
        $save->save();
        return redirect()->back();

    }
}
