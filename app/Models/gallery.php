<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'header_image',
        'description',
        'galleries',
        'gallery_title',
        'cover_text',
    ];

    protected $casts = [
        'galleries' => 'json',
    ];
}
