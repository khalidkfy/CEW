<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'category_id',
        'sub_category_id',
        'price',
        'description',
        'long_description',
        'images',
        'cover_image',
    ];

    protected $casts = [
        'images' => 'json',
    ];

    /**
     * ! Relations
     * ? With Category ( Reverse Relation => One To Many )
     * ? With Sub Category ( Reverse Relation => One To Many )
     */

    // Category
    public function category(): belongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Sub Category
    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'sub_category_id', 'id');
    }
}
