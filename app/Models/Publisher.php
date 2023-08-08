<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    protected $with = ['products'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
