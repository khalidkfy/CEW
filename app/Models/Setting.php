<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'email_address',
        'fax_address',
        'phone_number',
        'facebook_address',
        'twitter_address',
        'product_enable',
        'header_image',
        'footer_image',
        'footer_description',
        'certifications',
    ];

    protected $casts = [
        'certifications' => 'json',
    ];
}
