<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App\Contact;
use DB;
use Auth;

class ContactController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:contact-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        if(Auth::user()){
            $data = Contact::orderBy('created_at', 'desc')->paginate(20);
            return view('admin.contact', compact('data'));
        }
    }

    public function create()
    {
        return view('frontend.pages.contact-us');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);
        $data = $request->all();
        $data = Contact::create($data);
        Session::flash('message','Contact Submit Successfully. We will back to you soon.');
        return redirect('/contact-us/create');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        Session::flash('message', 'Successfully Deleted');
        return redirect('/contact-us');
    }
}
