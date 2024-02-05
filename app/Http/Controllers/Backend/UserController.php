<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['users'] = User::where('role', $request->role)->orderBy('name', 'ASC')->get();
        return view('backend.users.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('user_file')) {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|Min:6',
                'user_file' => 'required|image|mimes:jpg,jpeg,png|max:2048',
                'status' => 'required'
            ]);

            $file_name = uniqid() . '.' . $request->user_file->getClientOriginalExtension();
            $request->user_file->move(public_path('images/users'), $file_name);
        } else {
            $file_name = null;
        }


        $user = User::insert(
            [
                "name" => $request->name,
                "email" => $request->email,
                "password" => Hash::make($request->password),
                "user_file" => $file_name,//İşlem
                "status" => $request->status
            ]
        );

        if ($user) {
            return redirect(route('user.index'))->with('success', 'İşlem Başarılı');
        }
        return back()->with('error', 'İşlem Başarısız');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::where('id', $id)->first();
        return view('backend.users.edit')->with('users', $users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);


        if ($request->hasFile('user_file')) {
            $request->validate([
                'user_file' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            $file_name = uniqid() . '.' . $request->user_file->getClientOriginalExtension();
            $request->user_file->move(public_path('images/users'), $file_name);


            if (strlen($request->password) > 0) {

                $request->validate([
                    'password' => 'required|Min:6'
                ]);

                $user = \App\User::Where('id', $id)->update(
                    [
                        "name" => $request->name,
                        "email" => $request->email,
                        "user_file" => $file_name,//İşlem
                        "password" => Hash::make($request->password),
                        "status" => $request->status,
                    ]
                );
            } else {
                $user = User::Where('id', $id)->update(
                    [
                        "name" => $request->name,
                        "email" => $request->email,
                        "user_file" => $file_name,//İşlem
                        "status" => $request->status,
                    ]
                );
            }


            $path = 'images/users/' . $request->old_file;
            if (file_exists($path)) {
                @unlink(public_path($path));
            }

        } else {

            if (strlen($request->password) > 0) {

                $request->validate([
                    'password' => 'required|Min:6'
                ]);

                $user = User::Where('id', $id)->update(
                    [
                        "name" => $request->name,
                        "email" => $request->email,
                        "password" => Hash::make($request->password),
                        "status" => $request->status,
                    ]
                );

            } else {

                $user = User::Where('id', $id)->update(
                    [
                        "name" => $request->name,
                        "email" => $request->email,
                        "status" => $request->status,
                    ]
                );

            }


        }

        if ($user) {
            return back()->with('success', 'İşlem Başarılı');
        }
        return back()->with('error', 'İşlem Başarısız');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find(intval($id));
        if ($user->delete()) {
            echo 1;
        }
        echo 0;
    }

    public function sortable()
    {
//        print_r($_POST['item']);

        foreach ($_POST['item'] as $key => $value) {
            $users = User::find(intval($value));
            $users->users_must = intval($key);
            $users->save();
        }

        echo true;
    }

    public function importStore(Request $request)
    {
        if (strtolower($request->file->getClientOriginalExtension()) == "xls") {
            $excel = \Shuchkin\SimpleXLS::parse($request->file);
        } elseif (strtolower($request->file->getClientOriginalExtension()) == "xlsx") {
            $excel = \Shuchkin\SimpleXLSX::parse($request->file);
        }
        $xls = $excel->rows();
        unset($xls[0]);
        foreach (array_values($xls) as $user){
            User::create([
               'name' => $user[0],
                'email' => $user[1],
                'password' => Hash::make($user[2]),
                'role' => $request->role
            ]);
        }
    }

    public function import()
    {
        return view('backend.users.import');
    }
}
