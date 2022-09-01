<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    public $table = 'contact_us';

    protected $fillable = [
        'full_name',
        'subject',
        'email',
        'prefix_number',
        'phone_number',
        'message',
    ];
}
