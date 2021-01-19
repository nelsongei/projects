<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    //
    public function index(): bool
    {
        return true;
    }
}
