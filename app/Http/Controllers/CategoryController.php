<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class CategoryController extends BaseController
{

//    public function index(){
//        $categories=Category::all(); //gaunu duom
//
//        //return view('pages.forma', compact('categories'));//siunciu sablona
//        return dd($categories);
//    }

    public function storeCategory(Request $request){

       $request->validate([
            'name'=>'required',
        ]);


       Category::create([
            'name'=>request('name'),
        ]);

        return redirect('/add-category')
            ->with('success', 'Category created!');
    }
    public function createCategory(){
        $categories = Category::all();
        return view('pages.add-category')
            ->with("categories",$categories );
    }

    public function show($id){
        $posts = Post::where("cat_id", "=", $id)->get();
        //$post = Post::find($id);
        return view('category.{id}', compact('posts'));
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
}