<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $rules = [
        'email'=>'unique:suppliers'
    ];
    public function asset(){
        return $this->hasMany(Asset::class);
    }
}
