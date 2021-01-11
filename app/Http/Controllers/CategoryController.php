<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index(){
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
}
