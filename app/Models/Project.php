<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Project extends Model
{
    use HasFactory, Notifiable;
//    protected $casts =[
//        'user_id'=>'array'
//    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
