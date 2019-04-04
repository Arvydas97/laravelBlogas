<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Post;

class PostController extends BaseController
{
    public function index(){
        $posts=Post::all(); //gaunu duom


        return view('pages.home', compact('posts'));//siunciu sablona
    }
    public function createPost(){
        return view('pages.forma');
    }

    public function create(){
        return view('pages.create-post');
    }
    public function store(Request $request){
     $validate=$request->validate([
         'title'=>'required',
         'description'=>'required'
     ]);





     $post = Post::create([
         'title'=>request('title'),
         'description'=>request('description')
     ]);

     return redirect('/');

    }
}
