<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MPBoxHeader extends Model
{
    use HasFactory;

    public $table = 'm_p_box_headers';

    protected $fillable = [
        'title',
        'sub_title',
        'image',
        'button_active',
        'button_action',
        'button_text',
    ];

    /**
     * ! Accessors For Image
     */
    public function getBoxHeaderImageAttribute()
    {
        if (!$this->image) {
            return asset('images/main_page/box_header_image.png');
        }

        return asset('/storage/' . $this->image);
    }
}
