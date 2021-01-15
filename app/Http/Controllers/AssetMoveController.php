<?php

namespace App\Http\Controllers;

use App\Models\AssetMove;
use Illuminate\Http\Request;

class AssetMoveController extends Controller
{
    //
    //
    public function index() {
        return AssetMove::all();
    }
    public function show() {
        return view('assets.moveAsset');
    }
    //
    public function store(Request $request) {
        $moveAsset = new AssetMove();
        $moveAsset->asset_id = $request->asset_id;
        $moveAsset->user_id = $request->user_id;
        $moveAsset->department_id = $request->department_id;
        $moveAsset->save();
        //
        if($moveAsset){
            return response()->json(['status'=>0]);
        }
        return response()->json(['status'=>1]);
    }
}
