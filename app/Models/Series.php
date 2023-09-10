<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Series extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'publisher_id'];

    protected $with = ['products'];

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
