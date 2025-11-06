<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    /**
     * Relasi: Satu Kategori memiliki BANYAK Produk.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
