<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'header_image',
        'images'
    ];


    protected $casts = [
        'images' => 'json',
    ];
}
