<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $casts = [
        'products' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}