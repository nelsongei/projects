<?php

namespace App\Http\Controllers;

use App\Charts\DataChart;
use App\Models\ActivityLog;
use App\Models\Asset;
use App\Models\Category;
use App\Models\Purchase;
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
        $assets = Asset::all()->count();
        $assetValue = Purchase::select('total_amount')->sum('total_amount');
        $maintenance = Asset::all()->where('maintenance',true)->count();
        //
        $assetName = Asset::all();
        foreach ($assetName as $asset){
            $assetChart = new DataChart();
            $assetChart->labels([$asset->asset_name,'Depreciation Value']);
            $assetChart->dataset('Assets','bar',[$asset->purchase->total_amount,$asset->purchase->total_amount])
                ->color('#f96f34')
                ->backgroundColor('#f96f34')
                ->fill(false);
        }
        return view('assets.dashboard',compact('assets','assetValue','maintenance','assetChart'));
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
        $category = new Category();
        $category->category = $request->category;
        $category->asset_type = $request->asset_type;
        $category->save();
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
        $category->asset_type = $request->asset_type;
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
