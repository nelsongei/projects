<?php

namespace App\Http\Controllers;

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
}
