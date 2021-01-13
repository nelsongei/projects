<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
    public function categories(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function suppliers(){
        return $this->belongsTo(Supplier::class,'supplier_id');
    }
}
