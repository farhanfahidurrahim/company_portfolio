<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function admin()
    {
        return view('backend.index');
    }

    public function adminProfileEdit()
    {
        return view('backend.profile_edit');
    }

    public function adminProfileUpdate(Request $request,$id)
    {
        //return $request->all();
        $id=User::FindOrFail($id);
        if ($id) {
            $request->validate([
                'name'=>'required',
                // 'email'=>'email',
            ]);
            $data=$request->all();
            $update=$id->fill($data)->save();
            if ($update) {
                return redirect()->back()->with('success',"Profile Update Successfully!");
            }
            else{
                return redirect()->back()->with('error',"Try Again!");
            }

        }else{
            return redirect()->back()->with('error',"Data Not Found!");
        }
    }
}
