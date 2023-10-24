<?php

namespace App\Models;

use App\Enums\RatingEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rewiew extends Model
{
    use HasFactory;

    protected $fillable = ['profit', 'unprofit', 'text', 'user_id', 'product_id'];

    protected $casts = [
        'rating' => RatingEnum::class,
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
