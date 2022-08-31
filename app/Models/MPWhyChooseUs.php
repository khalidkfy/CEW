<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MPWhyChooseUs extends Model
{
    use HasFactory;

    public $table = 'm_p_why_choose_us';

    protected $fillable = [
        'image',
        'text',
        'description'
    ];
}
