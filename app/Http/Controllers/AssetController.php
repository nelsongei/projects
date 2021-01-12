<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    //
    public function index(){
        return Asset::orderBy('id','desc')->with('category')->get();
    }
}
