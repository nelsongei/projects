<?php

namespace App\Http\Controllers;

use App\Charts\DataChart;
use App\Models\Asset;
use App\Models\Category;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    //
    public function index(){
        return Asset::orderBy('id','desc')->with('categories','suppliers','purchase')->get();
    }
    //
    public function addAssetForm(){
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('assets.AddAsset',compact('categories','suppliers'));
    }
    //
    public function show(Asset $asset){
        $depreciation = $asset->purchase->total_amount;
        $salvage_value = (0.375*$depreciation);
        $straight_line_depreciation = (($depreciation-$salvage_value)/5);
        //Chart
        $finalChart = new DataChart();
        $finalChart->labels(['Initial Price','Final After Depreciation']);
        $finalChart->dataset('Asset Depreciation Rate(5 YRS)','line',[$depreciation,$straight_line_depreciation])
                  ->color('#dc3545')
                  ->backgroundColor('#f96f34')
                  ->fill(false);
        return view('assets.view',compact('asset','finalChart'));
    }
    //
    public function store(Request $request){
        $assets = new Asset();
        $assets->asset_name = $request->asset_name;
        $assets->category_id = $request->category_id;
        $assets->supplier_id = $request->supplier_id;
        $assets->asset_serial_no = $request->asset_serial_no;
        $assets->department = $request->department;
        $assets->location = $request->location;
        $assets->save();
        //
        $assetId = $assets->id;
        $supplierId = $assets->supplier_id;
        $purchase = new Purchase();
        $purchase->asset_id = $assetId;
        $purchase->receipt_no = $request->receipt_no;
        $purchase->quantity = $request->quantity;
        $purchase->supplier_id = $supplierId;
        $purchase->amount = $request->amount;
        $purchase->purchase_date = $request->purchase_date;
        $purchase->total_amount = $request->total_amount;
        $purchase->save();
        if ($assets && $purchase){
            return response()->json(['status'=>0]);
        }
        return response()->json(['status'=>1]);
    }
    public function update(Request $request,$id){
        $assets = Asset::find($id);
        $assets->asset_name = $request->asset_name;
        $assets->category_id = $request->category_id;
        $assets->supplier_id = $request->supplier_id;
        $assets->asset_serial_no = $request->asset_serial_no;
        $assets->department = $request->department;
        $assets->location = $request->location;
        $assets->push();
        if ($assets){
            return response()->json(['status'=>0]);
        }
        return response()->json(['status'=>1]);
    }
    public function destroy($id){
        $assets=Asset::find($id)->delete();
        if($assets){
            return response()->json(['status'=>0]);
        }
        return response()->json(['status'=>1]);
    }
}
