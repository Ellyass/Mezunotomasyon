<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Search;
use App\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $users = [];
        if ($request->filled('search')) {
            $users = User::where('name', 'LIKE', '%' . $request->search . '%')
                ->where('role', 'user')
                ->paginate(1);
        }
        return view('frontend.search.index', compact('users'));
    }
}
