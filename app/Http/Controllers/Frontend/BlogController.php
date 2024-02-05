<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogs;

class BlogController extends Controller
{
   public function index()
   {
       $data['blogs']=Blogs::all()->sortby('blogs_must');
       return view('frontend.blog.index',compact('data'));
   }

   public function detail($slug)
   {
       $blogList=Blogs::all()->sortBy('blogs_must');
       $blogs=Blogs::where('blogs_slug',$slug)->first();
       return view('frontend.blog.detail',compact('blogs','blogList'));
   }
}
