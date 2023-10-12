<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $with = ['products'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('amount');
    }

    public function scopeTotalPrice(): int
    {
        return $this->products->reduce(fn ($accum, $product) => $accum + $product->price * $product->pivot->amount, 0);
    }
}
