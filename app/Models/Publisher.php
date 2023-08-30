<?php

namespace App\Models;

use App\Models\Series;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Publisher extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    protected $with = ['products'];

    public function series()
    {
        return $this->hasMany(Series::class);
    }

    public function products()
    {
        return $this->hasManyThrough(Product::class, Series::class);
    }
}
