<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_name',
        'short_description',
        'icon',
        'button_text',
        'button_active',
        'title',
        'description',
        'header_image',
        's_button_text',
        's_button_active',
        'long_description',
        'color'
    ];
}
