<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function socialLink()
    {
        $data=SocialLink::first();
        return view('backend.social.index',compact('data'));
    }

    public function socialLinkStore(Request $request)
    {
        // return $request->all();
        $data=$request->all();
        $store=SocialLink::create($data);
        if ($store) {
            return redirect()->route('social.link')->with('success',"Added Successfully");
        }
        else{
            return redirect()->back()->with('error',"Please Try Again!");;
        }
    }

    public function socialLinkEdit()
    {
        $socialink  = SocialLink::where('id', 1)->first();
        return view('backend.social.index', compact('socialink'));
    }
}
