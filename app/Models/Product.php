<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'price',
        'description',
        'image',
        'view_count',
        'category_id', // Kolom baru
        'is_promo',    // Kolom baru
        'promo_price',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
