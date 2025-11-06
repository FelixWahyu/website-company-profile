<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromoSlide extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'overlay_text',
        'button_text',
        'link',
        'is_active',
    ];
}
