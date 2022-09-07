<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'prefix_number',
        'phone_number',
        'message',
        'products_id',
        'service_id',
    ];
}
