<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\GalleryAlbum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\GalleryImage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function albumIndex()
    {
        $data=GalleryAlbum::orderBy('id','DESC')->get();
        return view('backend.gallery.album_index',compact('data'));
    }

    public function albumStatus(Request $request)
    {
        //dd($request->all());
        if ($request->mode=='true') {
            DB::table('gallery_albums')->where('id',$request->id)->update(['status'=>'active']);
        }
        else{
            DB::table('gallery_albums')->where('id',$request->id)->update(['status'=>'inactive']);
        }

        return response()->json(['msg'=>'Successfully Updated Status','status'=>true]);
    }

    public function albumCreate()
    {
        return view('backend.gallery.album_create');
    }

    public function albumStore(Request $request)
    {
        //return $request->all();
        $request->validate([
            'title'=>'required',
            'status'=>'required',
        ]);

        $data=$request->all();
        $slug=Str::slug($request->input('title'));
        $data['slug']=$slug;
        $store=GalleryAlbum::create($data);
        if ($store) {
            return redirect()->route('album.index')->with('success',"New Added Successfully");
        }
        else{
            return redirect()->back()->with('error',"Please Try Again!");;
        }
    }

    public function albumEdit($id)
    {
        $data=GalleryAlbum::FindorFail($id);
        return view('backend.gallery.album_edit',compact('data'));
    }

    public function albumUpdate(Request $request,$id)
    {
        $id=GalleryAlbum::FindOrFail($id);
        if ($id) {
            $request->validate([
                'title'=>'required',
            ]);

            $data=$request->all();
            $slug=Str::slug($request->input('title'));
            $data['slug']=$slug;
            $update=$id->fill($data)->save();
            if ($update) {
                return redirect()->route('album.index')->with('success',"Updated Successfully");
            }
            else{
                return back()->with('error',"Try Again!");
            }
        }
        else{
            return back()->with('error',"No Data Found!");
        }

        return view('backend.gallery.album_create');
    }

    public function index()
    {
        $data=GalleryImage::orderBy('id','DESC')->get();
        return view('backend.gallery.index',compact('data'));
    }

    public function galleryStatus(Request $request)
    {
        //dd($request->all());
        if ($request->mode=='true') {
            DB::table('gallery_images')->where('id',$request->id)->update(['status'=>'active']);
        }
        else{
            DB::table('gallery_images')->where('id',$request->id)->update(['status'=>'inactive']);
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
        $album=GalleryAlbum::where('status','active')->get();
        return view('backend.gallery.create',compact('album'));
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
            'album_id'=>'required',
            'status'=>'required',
        ]);

        $data=$request->all();
        $slug=Str::slug($request->input('title'));
        $data['slug']=$slug;
        $store=GalleryImage::create($data);
        if ($store) {
            return redirect()->route('gallery.index')->with('success',"New Added Successfully");
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
        $data=GalleryImage::FindorFail($id);
        return view('backend.gallery.edit',compact('data'));
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
        //
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
