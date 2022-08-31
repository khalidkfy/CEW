<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class MPOurPartners extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'link_action',
        'link_text',
        'link_active',
    ];

    /**
     * ! Relation
     * ? With Image ( MorphTo )
     */

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}

