<?php

namespace App\Http\Controllers\Frontend;

use App\Models\About;
use App\Models\Banner;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\Administrative;
use App\Http\Controllers\Controller;
use App\Models\ContactMessage;

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
