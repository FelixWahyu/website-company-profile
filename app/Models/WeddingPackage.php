<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeddingPackage extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'price',
        'features',
        'description',
        'image',
        'view_count',
    ];

    protected function casts(): array
    {
        return [
            'features' => 'array', // Otomatis konversi JSON ke Array
        ];
    }
}
