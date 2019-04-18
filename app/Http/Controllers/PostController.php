<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostController extends BaseController
{

    public function _construct(){
        $this->middleware('auth',['only'=>'index', 'create', 'store', 'update']);
    }
    public function index(){
        $posts=Post::orderBy('created_at', 'desc')->paginate(4); //gaunu duom
        $categories=Category::all(); //gaunu duom

        //return view('pages.forma', compact('categories'));//siunciu sablona
        return view('pages.home')
            ->with('posts', $posts)
            ->with("categories",$categories);
    }




    public function create( ){

        $user=Auth::user();
        $categories=Category::all();
        return view('pages.forma')
            ->with("categories",$categories)
            ->with('user', $user);
    }
    public function store(Request $request){
     $request->validate([
         'title'=>'required',
         'description'=>'required',
         'img'=>'image|nullable|max:2048',
         'cat_id'=>'required',
         'user_id'=>'required'
     ]);

        $imagePath="";
     if ($request['img'] ){
         $imagePath = $request->file('img')->store('public/images');
     }
     $imagePath2=str_replace("public", "storage", $imagePath);

      Post::create([
         'title'=>request('title'),
         'description'=>request('description'),
         'img'=>$imagePath2,
         'cat_id'=>request('cat_id'),
         'user_id'=>request('user_id')

     ]);

     return redirect('/forma')
         ->with('success', 'Post created!');
    }



    public function show($id){
        $categories=Category::all();
        $post = Post::find($id);
        return view('pages.post')
            ->with('post', $post)
            ->with("categories",$categories);
    }
    public function showByID($id){
        $categories=Category::all();
        $posts = Post::where("cat_id", "=", $id)
            ->orderBy('created_at','desc')
            ->get() ;
        return view('pages.category')
            ->with('posts', $posts)
            ->with("categories",$categories);
    }



    public function edit($id)
    {
        $post = Post::find($id);
        $categories=Category::all();
        if(Gate::denies('edit-post', $post)){
            return view('auth.login');
        }


        return view('posts.edit-post')
            ->with('post', $post)
            ->with("categories",$categories);
    }

    public function update(Request $request, $id)
    {

        $post = Post::find($id);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'img' => 'image|nullable|max:1999'
        ]);

//        if($request->hasFile('img')){
//           File::delete('storage/app/'.$post->img);
//
//            $filenameWithExt = $request->file('image')->getClientOriginalName(); // Full file name
//            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); //File name without extension
//            $extension = $request->file('image')->guessClientExtension(); //Only file extesion name
//            $fileName = $filename.'_'.time().'.'.$extension; //Concatenated file name and extension with custom naming extensions
//       }
//
//         //Image path ready to upload
//        $request->file('post-image')->storeAs('public/posts-images', $fileName);

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
        if(Gate::denies('delete-post', $post)){
            return view('auth.login');
        }
            //File::delete('storage/app/'.$post->img);
            $post->delete();



        return redirect('/');
    }

}
