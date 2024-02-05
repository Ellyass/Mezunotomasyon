<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['blogs'] = Blogs::all()->sortBy('blogs_must');
        return view('backend.blogs.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (strlen($request->blogs_slug)>3)
        {
            $slug=Str::slug($request->blogs_slug);
        } else {
            $slug=Str::slug($request->blogs_title);
        }

        if ($request->hasFile('blogs_file'))
        {
            $request->validate([
                'blogs_title' => 'required',
                'blogs_content' => 'required',
                'blogs_must' => 'required',
                'blogs_file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name=uniqid().'.'.$request->blogs_file->getClientOriginalExtension();
            $request->blogs_file->move(public_path('images/blogs'),$file_name);
        } else {
            $file_name=null;
        }



        $blog=Blogs::insert(
            [
                "blogs_title" => $request->blogs_title,
                "blogs_slug" => $slug, //işlem
                "blogs_must" =>$request->blogs_must,
                "blogs_file" => $file_name,//İşlem
                "blogs_content" => $request->blogs_content,
                "blogs_status" => $request->blogs_status,
            ]
        );

        if ($blog)
        {
            return redirect(route('blog.index'))->with('success','İşlem Başarılı');
        }
        return back()->with('error','İşlem Başarısız');
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
        $blogs=Blogs::where('id',$id)->first();
        return view('backend.blogs.edit')->with('blogs',$blogs);
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
        if (strlen($request->blogs_slug)>3)
        {
            $slug=Str::slug($request->blogs_slug);
        } else {
            $slug=Str::slug($request->blogs_title);
        }

        if ($request->hasFile('blogs_file'))
        {
            $request->validate([
                'blogs_title' => 'required',
                'blogs_content' => 'required',
                'blogs_file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name=uniqid().'.'.$request->blogs_file->getClientOriginalExtension();
            $request->blogs_file->move(public_path('images/blogs'),$file_name);

            $blog=Blogs::Where('id',$id)->update(
                [
                    "blogs_title" => $request->blogs_title,
                    "blogs_slug" => $slug, //işlem
                    "blogs_file" => $file_name,//İşlem
                    "blogs_content" => $request->blogs_content,
                    "blogs_status" => $request->blogs_status,
                ]
            );

            $path='images/blogs/'.$request->old_file;
            if (file_exists($path))
            {
                @unlink(public_path($path));
            }

        } else {
            $blog=Blogs::Where('id',$id)->update(
                [
                    "blogs_title" => $request->blogs_title,
                    "blogs_slug" => $slug, //işlem
                    "blogs_content" => $request->blogs_content,
                    "blogs_status" => $request->blogs_status,
                ]
            );
        }





        if ($blog)
        {
            return back()->with('success','İşlem Başarılı');
        }
        return back()->with('error','İşlem Başarısız');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog=Blogs::find(intval($id));
        if ($blog->delete())
        {
            echo 1;
        }
        echo 0;
    }

    public function sortable()
    {
//        print_r($_POST['item']);

        foreach ($_POST['item'] as $key => $value) {
            $blogs = Blogs::find(intval($value));
            $blogs->blogs_must = intval($key);
            $blogs->save();
        }

        echo true;
    }
}
