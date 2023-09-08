<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['phone', 'address', 'status'];

    public const STATUS = [
        0 => 'Новый',
        1 => 'Не оплачен',
        2 => 'Оплачен',
        3 => 'Завершен',
        4 => 'Отменен'
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
