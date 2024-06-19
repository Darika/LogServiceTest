<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'client',
        'message',
        'level',
        'user_id',
        'created_at',
    ];

    protected $dates = [
        'created_at'
    ];
}
