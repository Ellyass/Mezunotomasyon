<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sliders'] = Sliders::all()->sortBy('sliders_must');
        return view('backend.sliders.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (strlen($request->sliders_slug)>3)
        {
            $slug=Str::slug($request->sliders_slug);
        } else {
            $slug=Str::slug($request->sliders_title);
        }

        if ($request->hasFile('sliders_file'))
        {
            $request->validate([
                'sliders_title' => 'required',
                'sliders_content' => 'required',
                'sliders_must' => 'required',
                'sliders_file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name=uniqid().'.'.$request->sliders_file->getClientOriginalExtension();
            $request->sliders_file->move(public_path('images/sliders'),$file_name);
        } else {
            $file_name=null;
        }



        $slider=Sliders::insert(
            [
                "sliders_title" => $request->sliders_title,
                "sliders_slug" => $slug, //işlem
                "sliders_must" =>$request->sliders_must,
                "sliders_file" => $file_name,//İşlem
                "sliders_content" => $request->sliders_content,
                "sliders_status" => $request->sliders_status,
            ]
        );

        if ($slider)
        {
            return redirect(route('slider.index'))->with('success','İşlem Başarılı');
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
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sliders=Sliders::where('id',$id)->first();
        return view('backend.sliders.edit')->with('sliders',$sliders);
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
        if (strlen($request->sliders_slug)>3)
        {
            $slug=Str::slug($request->sliders_slug);
        } else {
            $slug=Str::slug($request->sliders_title);
        }

        if ($request->hasFile('sliders_file'))
        {
            $request->validate([
                'sliders_title' => 'required',
                'sliders_content' => 'required',
                'sliders_file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name=uniqid().'.'.$request->sliders_file->getClientOriginalExtension();
            $request->sliders_file->move(public_path('images/sliders'),$file_name);

            $slider=Sliders::Where('id',$id)->update(
                [
                    "sliders_title" => $request->sliders_title,
                    "sliders_slug" => $slug, //işlem
                    "sliders_file" => $file_name,//İşlem
                    "sliders_content" => $request->sliders_content,
                    "sliders_status" => $request->sliders_status,
                ]
            );

            $path='images/sliders/'.$request->old_file;
            if (file_exists($path))
            {
                @unlink(public_path($path));
            }

        } else {
            $slider=Sliders::Where('id',$id)->update(
                [
                    "sliders_title" => $request->sliders_title,
                    "sliders_slug" => $slug, //işlem
                    "sliders_content" => $request->sliders_content,
                    "sliders_status" => $request->sliders_status,
                ]
            );
        }





        if ($slider)
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
        $slider=Sliders::find(intval($id));
        if ($slider->delete())
        {
            echo 1;
        }
        echo 0;
    }

    public function sortable()
    {
//        print_r($_POST['item']);

        foreach ($_POST['item'] as $key => $value) {
            $sliders = Sliders::find(intval($value));
            $sliders->sliders_must = intval($key);
            $sliders->save();
        }

        echo true;
    }
}
