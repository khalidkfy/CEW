<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'parent_id',
        'type',
    ];

    /**
     * ! Relations
     * ? With Category Itself ( It Can Be NULL ) => Children Function => One To Many
     * ? With Product ( One To Many )
     */

    // parent function
    public function children(): hasMany
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    // Product
    public function products(): hasMany
    {
        return $this->hasMany(Product::class, 'category_id');
    }

}
