<?php

namespace App\Models;

use App\Enums\OrderStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['phone', 'address', 'status'];

    protected $casts = [
        'status' => OrderStatusEnum::class,
    ];

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
