<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pages;

class PageController extends Controller
{
    public function detail($slug)
    {
        $pageList=Pages::all()->sortBy('pages_must');
        $pages=Pages::where('pages_slug',$slug)->first();
        return view('frontend.page.detail',compact('pages','pageList'));
    }
}
