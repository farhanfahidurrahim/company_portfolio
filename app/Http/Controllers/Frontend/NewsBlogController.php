<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsBlogController extends Controller
{
    public function newsBlog()
    {
        $news=News::where('status','active')->orderBy('id','DESC')->get();
        return view('frontend.newsblog',compact('news'));
    }
}
