<?php

namespace App\Http\Controllers;

use App\abouts;
use Illuminate\Http\Request;

class AboutsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $about = About::find($id);
        return view('admin.about.edit', ['about' => $about]);
    }
    public function update(Request $request, $id)
    {
        $about = About::find($id);
        $data = $request->except('about_img','mission_img','facts_img','principal_img'); 
        if ($request->hasFile('about_img')){
            $data['about_img']=uploadFile('about_img',$request,'uploads/page/');
        }
        if ($request->hasFile('mission_img')){
            $data['mission_img']=uploadFile('mission_img',$request,'uploads/page/');
        } 
        if ($request->hasFile('facts_img')){            
            $data['facts_img']=uploadFile('facts_img',$request,'uploads/page/');
        } 
        if ($request->hasFile('principal_img')){            
            $data['principal_img']=uploadFile('principal_img',$request,'uploads/');
        } 
        $about->update($data);
        Session::flash('message', 'Succesfully updated');
        return redirect('/aboutcollege');
    }
    public function destroy($id)
    {
        //
    }
}
