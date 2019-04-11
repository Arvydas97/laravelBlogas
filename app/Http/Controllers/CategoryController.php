<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends BaseController
{

//    public function index(){
//        $categories=Category::all(); //gaunu duom
//
//        //return view('pages.forma', compact('categories'));//siunciu sablona
//        return dd($categories);
//    }

    public function storeCategory(Request $request){
        $validate=$request->validate([
            'name'=>'required',
        ]);


        $post = Category::create([
            'name'=>request('name'),
        ]);

        return redirect('/');
    }
    public function createCategory(){
        return view('pages.add-category');
    }
}