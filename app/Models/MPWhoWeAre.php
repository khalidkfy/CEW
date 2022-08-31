<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MPWhoWeAre extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'button_action',
        'button_text',
        'image',
        'button_active',
    ];
}
