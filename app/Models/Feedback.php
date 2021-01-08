<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $fillable = [
        'task_id','feedback'
    ];
    public function tasks(){
        return $this->belongsTo(Task::class);
    }
}
