<?php

namespace App\Models;

use App\Enums\OrderStatusEnum;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['phone', 'address', 'status'];

    protected $casts = [
        'status' => OrderStatusEnum::class
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('amount');
    }
}
