<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\AssetMove;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

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
        return view('assets.moveAsset',compact('departments','assets','users'));
    }
    //
    public function store(Request $request) {
        $moveAsset = new AssetMove();
        $moveAsset->asset_id = $request->asset_id;
        $moveAsset->user_id = $request->user_id;
        $moveAsset->department_id = $request->department_id;
        $moveAsset->notes = $request->notes;
        $moveAsset->save();
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
