<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable=[
        'project_id','card_id','task_name','task_description','due_date'
    ];
    public function cards(){
        return $this->belongsTo(Card::class);
    }
    public function projects(){
        return $this->belongsTo(Project::class);
    }
}
