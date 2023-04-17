<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Client::orderBy('id','DESC')->get();
        return view('backend.clients.index',compact('data'));
    }
    public function clientStatus(Request $request)
    {
        //dd($request->all());
        if ($request->mode=='true') {
            DB::table('clients')->where('id',$request->id)->update(['status'=>'active']);
        }
        else{
            DB::table('clients')->where('id',$request->id)->update(['status'=>'inactive']);
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
        return view('backend.clients.create');
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
            'name'=>'required',
            'logo'=>'required',
            'status'=>'required',
        ]);

        $data=$request->all();
        $store=Client::create($data);
        if ($store) {
            return redirect()->route('client.index')->with('success',"New Added Successfully");
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
        $data=Client::FindorFail($id);
        return view('backend.clients.edit',compact('data'));
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
        $id=Client::FindorFail($id);
        if ($id) {
            $request->validate([
                'name'=>'required',
                'logo'=>'required',
            ]);

            $data=$request->all();
            $update=$id->fill($data)->save();
            if ($update) {
                return redirect()->route('client.index')->with('success',"Updated successfully!");
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
        $id=Client::FindorFail($id);
        if ($id) {
            $data=$id->delete();
            if ($data) {
                return redirect()->route('client.index')->with('success',"Deleted successfully!");
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
