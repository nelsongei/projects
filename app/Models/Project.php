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
    protected $fillable =[
        'user_id','project','description'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function card(){
        return $this->hasMany(Card::class);
    }
}
