<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'key',
        'value',
    ];

    // Nonaktifkan timestamps karena tabel settings tidak memilikinya
    public $timestamps = false;
}
