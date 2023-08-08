<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Order;
use App\Models\Rewiew;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'price', 'amount', 'pages', 'size', 'cover-type', 'weight',
        'year', 'rating'
    ];

    protected $with = ['category', 'tags', 'rewiews', 'images'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function rewiews()
    {
        return $this->hasMany(Rewiew::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function publishers()
    {
        return $this->belongsToMany(Publisher::class);
    }

    public function series()
    {
        return $this->belongsToMany(Series::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['search'] ?? false,
            function ($query, $search) {
                $query
                ->where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
            }
        );
    }

}
