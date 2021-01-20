<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\AssetMove;
use App\Models\Department;
use App\Models\Inventory;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssetMoveController extends Controller
{
    //
    //
    public function index() {
        return AssetMove::orderBy('id','desc')->with('asset','user','department')->get();
    }
    public function show() {
        $users = User::all();
        $assets = Asset::all();
        $departments = Department::all();
        $purchases = Purchase::all();
        return view('assets.moveAsset',compact('departments','assets','users','purchases'))->with('asset');
    }
    //
    public function store(Request $request,$id) {
        $moveAsset = new AssetMove();
        $moveAsset->asset_id = $request->asset_id;
        $moveAsset->user_id = $request->user_id;
        $moveAsset->department_id = $request->department_id;
        $moveAsset->notes = $request->notes;
        $moveAsset->moved  = $request->moved;
        $moveAsset->remaining = 1;
        $moveAsset->save();
        //Update Inventory Table After storing

        if($moveAsset->save()){
            $moved  = $moveAsset->moved;
            $inventory = new Inventory;
            $remaining = DB::table('inventories')->select('remaining')->where('asset_id',$id)->get();
            $updatedRemaining = $remaining-$moved;
            $inventory->moved = $moved;
            $inventory->remaining = $updatedRemaining;
            $inventory->save();
        }
        //
        if($moveAsset){
            return response()->json(['status'=>0]);
        }
        return response()->json(['status'=>1]);
    }
    public function destroy($id){
        $assetMove = AssetMove::find($id)->delete();
        if($assetMove){
            return response()->json(['status'=>0]);
        }
        return response()->json(['status'=>1]);
    }
}
