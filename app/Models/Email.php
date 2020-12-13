<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Email extends Model
{
    use HasFactory, Notifiable;
    protected $casts = [
        'cc'=>'array',
        'img_file'=>'array'
    ];
}
