<?php

namespace App\Http\Controllers;
use App\Post;
use App\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories=Category::all();
        $user=Auth::user();
        return view('pages.dashboard')
            ->with('user', $user)
            ->with('categories', $categories);
    }
}
