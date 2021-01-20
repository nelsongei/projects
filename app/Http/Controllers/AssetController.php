<?php

namespace App\Http\Controllers;

use App\Charts\DataChart;
use App\Models\Asset;
use App\Models\Category;
use App\Models\Department;
use App\Models\Inventory;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $departments = Department::all();
        return view('assets.AddAsset',compact('categories','suppliers','departments'));
    }
    //
    public function show(Asset $asset,Request $request){
        $departments = Department::all();
        $depreciation = $asset->purchase->total_amount;
        $salvage_value = (0.375*$depreciation);
        $straight_line_depreciation = (($depreciation-$salvage_value)/5);
        //Chart
        $finalChart = new DataChart();
        $finalChart->labels(['Initial Price','Final After Depreciation']);
        $finalChart->dataset('Asset Depreciation Rate(5 YRS)','line',[$depreciation,$straight_line_depreciation])
            ->color('#f96f34')
            ->backgroundColor('#f96f34')
            ->fill(false);

        //
//        $id = $request->get('id');
//        $asset = Asset::find($id);
        return view('assets.view',compact('asset','finalChart','departments'));
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
        //
        $assetQuatity = $purchase->quantity;
        $inventory = new Inventory();
        $inventory->user_id = 1;
        $inventory->department_id = 1;
        $inventory->asset_id = $assetId;
        $inventory->quantity = $assetQuatity;
        $inventory->remaining = $assetQuatity;
        $inventory->moved = 0;
        $inventory->save();
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
    //
    public function destroy($id){
        $assets=Asset::find($id)->delete();
        if($assets){
            return response()->json(['status'=>0]);
        }
        return response()->json(['status'=>1]);
    }
    //Update Asset Image
    public function updateImage(Request $request){
        $id = $request->id;
        $validator = Validator::make($request->all(),[
            'image'=>'required |image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if ($validator->fails()){
            toast('Image is required or input an image','warning');
            return redirect()->back();
        }
        $url = $request->image->store('assets','public');
        $update = Asset::where('id',$id)
            ->update(['image'=>$url]);
        if($update){
            toast('Asset Icon has been updated','success','top-right');
        }
        return redirect()->back();
    }
    //
    public function search(Request $request){
        $assets = Asset::where('asset_name',$request->keywords)->get();
        return response()->json($assets);
    }
    //Generate QR Code
    public function generateCode(Request $request){
        $id = $request->get('id');
        $asset = Asset::find($id);
        return view('assets.barcode')->with('asset',$asset);
    }
}
