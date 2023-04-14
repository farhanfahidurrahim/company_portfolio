<?php

namespace App\Http\Controllers\Frontend;

use App\Models\About;
use App\Models\Banner;
use App\Models\Client;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\Administrative;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function home()
    {
        $banner=Banner::where('status','active')->orderBy('id','DESC')->get();
        $about=About::orderBy('id','DESC')->first();
        $client=Client::where('status','active')->orderBy('id','DESC')->limit(8)->get();
        $testimonial=Testimonial::where('status','active')->orderBy('id','DESC')->limit(8)->get();
        $administrative=Administrative::where('status','active')->orderBy('id','DESC')->limit(6)->get();
        return view('frontend.index',compact('banner','about','client','testimonial','administrative'));
    }

}
