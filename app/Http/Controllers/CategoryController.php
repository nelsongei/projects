<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $suppliers = Supplier::all();
        $categories = Category::all();
        return view('assets.assets',compact('categories','suppliers'));
    }
    public function category(){
        return view('assets.category');
    }
    //Get Categories
    public function index(){
        return Category::all();
    }
    //Store Category
    public function store(Request $request){
        $data = request()->validate([
            'category'=>'unique:categories',
        ]);
        $category = Category::create($data);
        //
        $activity = new ActivityLog();
        $activity->user_id = 1;
        $activity->activity = 'created category';
        $activity->save();
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
