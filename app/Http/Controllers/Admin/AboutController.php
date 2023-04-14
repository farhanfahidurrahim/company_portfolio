<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=About::orderBy('id','DESC')->get();
        return view('backend.about.index',compact('data'));
    }

    public function aboutStatus(Request $request)
    {
        //dd($request->all());
        if ($request->mode=='true') {
            DB::table('abouts')->where('id',$request->id)->update(['status'=>'active']);
        }
        else{
            DB::table('abouts')->where('id',$request->id)->update(['status'=>'inactive']);
        }

        return response()->json(['msg'=>'Successfully Updated Status','status'=>true]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data=About::FindOrFail($id);
        return view('backend.about.edit',compact('data'));
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
        $id=About::FindorFail($id);
        if ($id) {
            $request->validate([
                'title'=>'required',
                'short_text'=>'required',
                'description'=>'required',
            ]);

            $data=$request->all();
            $update=$id->fill($data)->save();
            if ($update) {
                return redirect()->route('about.index')->with('success',"Updated successfully!");
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
        //
    }
}
