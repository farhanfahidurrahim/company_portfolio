<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactMessage()
    {
        $data=ContactMessage::orderBy('id','DESC')->get();
        return view('backend.contact.message',compact('data'));
    }

    public function index()
    {
        $data=Contact::orderBy('id','DESC')->get();
        return view('backend.contact.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'address'=>'required',
            'phone_one'=>'required|numeric',
            'phone_two'=>'required|numeric',
            'email'=>'required|email',
        ]);

        $data=$request->all();
        $store=Contact::create($data);
        if ($store) {
            return redirect()->route('contact.index')->with('success',"Added Successfully");
        }
        else{
            return redirect()->back()->with('error',"Please Try Again!");;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Contact::FindorFail($id);
        return view('backend.contact.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return $request->all();
        $id=Contact::FindorFail($id);
        if ($id) {
            $request->validate([
            'address'=>'required',
            'phone_one'=>'required|numeric',
            'phone_two'=>'required|numeric',
            'email'=>'required|email',
            ]);

            $data=$request->all();
            $update=$id->fill($data)->save();
            if ($update) {
                return redirect()->route('contact.index')->with('success',"Updated successfully!");
            }
            else{
                return redirect()->back()->with('error',"Try Again!");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id=Contact::FindorFail($id);
        if ($id) {
            $data=$id->delete();
            if ($data) {
                return redirect()->route('contact.index')->with('success',"Deleted successfully!");
            }
            else{
                return redirect()->back()->with('error',"Please Try Again!");;
            }
        }
        else{
            return redirect()->back()->with('error',"Data Not Found!");;
        }
    }
}
