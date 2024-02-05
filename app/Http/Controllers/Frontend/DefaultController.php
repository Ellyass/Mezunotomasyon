<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class DefaultController extends Controller
{
    public function index()
    {
        $data['blogs'] = Blogs::all()->sortby('blogs_must');
        $data['sliders'] = Sliders::all()->sortby('sliders_must');
        return view('frontend.default.index', compact('data'));
    }

    public function contact()
    {
        return view('frontend.default.contact');
    }

    public function login(){
        return view('backend.default.login');
    }

    public function sendMail(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required'
        ]);

        $data=[
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message
        ];

        Mail::to('aydemirelyesa86@gmail.com')->send(new SendMail($data));

        return back()->with('success',"Mail Başarıyla Gönderildi");
    }

}
