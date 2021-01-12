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
        $data = request()->validate([
            'category'=>'unique:categories',
        ]);
        $category = Category::create($data);
//        $category = new Category();
//        $category->category = $request->category;
//        $category->save();
        if ($category){
            return response()->json(['status'=>0]);
        }
        return response()->json(['status'=>1]);
    }
    //Update
    public function update(Request $request,$id)
    {
        $category = Category::findOrFail($id);
        $category->category = $request->category;
        $category->push();
        if ($category){
            return response()->json(['status'=>0]);
        }
        return response()->json(['status'=>1]);
    }
    public function destroy($id){
        $category = Category::find($id)->delete();
        if ($category){
            return response()->json(['status'=>0]);
        }
        return response()->json(['status'=>1]);
    }
}
