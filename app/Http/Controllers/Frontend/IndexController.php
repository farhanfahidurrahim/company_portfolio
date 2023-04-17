<?php

namespace App\Http\Controllers\Frontend;

use App\Models\About;
use App\Models\Banner;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Testimonial;
use App\Models\GalleryAlbum;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use App\Models\Administrative;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use App\Models\Video;

class IndexController extends Controller
{
    public function home()
    {
        $banner=Banner::where('status','active')->orderBy('id','DESC')->get();
        $about=About::orderBy('id','DESC')->first();
        $albums=GalleryAlbum::where('status','active')->orderBy('id','DESC')->limit(4)->get();
        $videos=Video::where('status','active')->orderBy('id','DESC')->limit(2)->get();
        $gallery=GalleryImage::all();
        $client=Client::where('status','active')->orderBy('id','DESC')->limit(8)->get();
        $testimonial=Testimonial::where('status','active')->orderBy('id','DESC')->limit(4)->get();
        $administrative=Administrative::where('status','active')->orderBy('id','DESC')->limit(4)->get();

        return view('frontend.index',compact('banner','about','client','testimonial','administrative','albums','gallery','videos',));
    }

    public function contact()
    {
        $contact=Contact::first();
        return view('frontend.contact',compact('contact'));
    }

    public function contactMessageStore(Request $request)
    {
        //return $request->all();
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'subject'=>'required',
            'message'=>'required',
        ]);

        $data=$request->all();
        $store=ContactMessage::create($data);
        if ($store) {
            return redirect()->route('frontend.contact')->with('success',"Your Message Successfully Sent!");
        }
        else{
            return redirect()->route('frontend.contact')->with('error',"Something went wrong!");
        }
    }
}
