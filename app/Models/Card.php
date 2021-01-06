<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $fillable=[
        'project_id','name'
    ];
    public function project()
    {
        return $this->belongsTo(Project::class,'project_id');
    }
    public function tasks(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Task::class,'card_id');
    }
}
