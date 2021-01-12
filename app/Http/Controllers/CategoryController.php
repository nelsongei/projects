<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function assetIndex(){
        return view('assets.index');
    }
    public function dashboard(){
        return view('assets.dashboard');
    }
    public function assets(){
        return view('assets.assets');
    }
    public function category(){
        return view('assets.category');
    }
    //Get Categories
    public function index(){
        return Category::all();
    }
    public function show(Category $category){
        return view('assets.view',compact('category'));
    }
    //Store Category
    public function store(Request $request){
        $category = new Category();
        $category->category = $request->category;
        $category->save();
        if ($category){
            return response()->json(['status'=>0]);
        }
        return response()->json(['status'=>1]);
    }
}
