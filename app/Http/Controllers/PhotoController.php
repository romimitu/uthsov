<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class PhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Photo::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.photo.index', compact('data'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = $request->except('image'); 
        $data['image']=uploadFile('image',$request,'uploads/slider/');
        $data = Photo::create($data);
        Session::flash('message','Added  Successfully');
        return redirect('/photos'); 
    }

    public function show(Photo $photo)
    {
        //
    }

    public function edit(Photo $photo)
    {
        $photo = Photo::find($photo->id);
        return view('admin.photo.edit', compact('photo'));
    }

    public function update(Request $request, Photo $photo)
    {
        $data = $request->except('image'); 
        if ($request->hasFile('image')){
            $data['image']=uploadFile('image',$request,'uploads/photo/');
        }        
        $photo->update($data);
        Session::flash('message', 'Succesfully updated');
        return redirect('/photos');
    }

    public function destroy(Photo $photo)
    {
        $photo->delete();
        Session::flash('message', 'Successfully Deleted');
        return redirect('/photos');
    }
}
