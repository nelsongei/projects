<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    //
    public function index(){
        return Supplier::all();
    }
    //
    public function store(Request $request){
        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->address = $request->address;
        $supplier->phone_no = $request->phone_no;
        $supplier->supplier_group = $request->supplier_group;
        $supplier->save();
        if($supplier){
            return response()->json(['status'=>0]);
        }
        return response()->json(['status'=>1]);
    }
    public function update(){

    }
}
