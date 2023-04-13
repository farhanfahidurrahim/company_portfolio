<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=News::orderBy('id','DESC')->get();
        return view('backend.news.index',compact('data'));
    }

    public function newsStatus(Request $request)
    {
        //dd($request->all());
        if ($request->mode=='true') {
            DB::table('news')->where('id',$request->id)->update(['status'=>'active']);
        }
        else{
            DB::table('news')->where('id',$request->id)->update(['status'=>'inactive']);
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
        return view('backend.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $request->validate([
            'title'=>'required',
            'photo'=>'required',
            'description'=>'required',
            'status'=>'required',
        ]);

        $data=$request->all();
        $slug=Str::slug($request->input('title'));
        $data['slug']=$slug;
        $store=News::create($data);
        if ($store) {
            return redirect()->route('news.index')->with('success',"New Added Successfully");
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
        $data=News::FindorFail($id);
        return view('backend.news.edit',compact('data'));
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
        $id=News::FindorFail($id);
        if ($id) {
            $request->validate([
                'title'=>'required',
                'photo'=>'required',
                'description'=>'required',
            ]);

            $data=$request->all();
            $slug=Str::slug($request->input('title'));
            $data['slug']=$slug;
            $update=$id->fill($data)->save();
            if ($update) {
                return redirect()->route('news.index')->with('success',"Updated successfully!");
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
        $id=News::FindorFail($id);
        if ($id) {
            $data=$id->delete();
            if ($data) {
                return redirect()->route('news.index')->with('success',"Deleted successfully!");
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
