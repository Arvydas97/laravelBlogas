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
         'description'=>'required',
         'img'=>'image|nullable|max:2048'
     ]);

        $imagePath="";
     if ($request['img'] ){
         $imagePath = $request->file('img')->store('public/images');
     }

     $post = Post::create([
         'title'=>request('title'),
         'description'=>request('description'),
         'img'=>$imagePath
     ]);

     return redirect('/');
    }
    public function show(Post $post){
        return view('pages.post', compact('post'));
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit-post')->with('post', $post);
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
        $post = Post::find($id);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'img' => 'image|nullable|max:1999'
        ]);

//        if($request->hasFile('post-image')){
//            File::delete('storage/posts-images/'.$post->img);
//
//            $filenameWithExt = $request->file('post-image')->getClientOriginalName(); // Full file name
//            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); //File name without extension
//            $extension = $request->file('post-image')->guessClientExtension(); //Only file extesion name
//            $fileName = $filename.'_'.time().'.'.$extension; //Concatenated file name and extension with custom naming extensions
//        }

        // Image path ready to upload
        //$request->file('post-image')->storeAs('public/posts-images', $fileName);

        Post::where('id',$id)->update([
            'title' => request('title'),
            'description' => request('description'),
            'img' => ''
        ]);

        //return redirect('/');
        return redirect('/');
    }


    public function destroy($id)
    {
        $post = Post::find($id);

        //File::delete('storage/app/'.$post->img);
        $post->delete();

        return redirect('/');
    }

}
