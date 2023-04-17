<?php

namespace App\Http\Controllers\Frontend;

use App\Models\GalleryAlbum;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    public function gallery()
    {
        $albums=GalleryAlbum::where('status','active')->orderBy('id','DESC')->get();
        return view('frontend.gallery.album',compact('albums'));
    }

    public function albumImage($id)
    {
        //dd($id);
        $images=GalleryImage::where('album_id',$id)->get();
        return view('frontend.gallery.image',compact('images'));
    }

    public function getAlbum($id)
    {
        $imgdata=GalleryImage::where('album_id', $id)->get();
        if(count($imgdata) > 0){
            return response(['data' => $imgdata], 200);
        }else{
            return response(['message' => 'Not Found'], 404);
        }
    }
}
