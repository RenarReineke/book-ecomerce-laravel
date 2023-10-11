<?php

namespace App\Models;

use App\Enums\CoverTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    public const FILTERS = [
        'search', 'rating', 'cover', 'fromPrice',
        'toPrice', 'category', 'series', 'publisher',
    ];

    protected $fillable = [
        'title', 'description', 'price', 'amount', 'pages', 'size', 'cover_type', 'weight',
        'year', 'rating', 'slug',
    ];

    protected $with = ['tags', 'rewiews', 'images'];

    // protected $casts = [
    //     'cover_type' => CoverTypeEnum::class,
    // ];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

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

    public function carts()
    {
        return $this->belongsToMany(Cart::class)->withPivot('amount');
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function series()
    {
        return $this->belongsTo(Series::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['search'] ?? false,
            function ($query, $search) {
                $query
                    ->where('title', 'like', '%'.$search.'%');
            }
        );

        $query->when(
            $filters['rating'] ?? false,
            function ($query, $rating) {
                $query
                    ->where('rating', $rating);
            }
        );

        $query->when(
            $filters['cover'] ?? false,
            function ($query, $cover) {
                $query
                    ->where('cover', $cover);
            }
        );

        $query->when(
            $filters['fromPrice'] ?? false,
            function ($query, $fromPrice) {
                $query
                    ->where('price', '>', $fromPrice);
            }
        );

        $query->when(
            $filters['toPrice'] ?? false,
            function ($query, $toPrice) {
                $query
                    ->where('price', '<', $toPrice);
            }
        );

        $query->when(
            $filters['category'] ?? false,
            function ($query, $category) {
                $query
                    ->where('category_id', $category);
            }
        );

        $query->when(
            $filters['series'] ?? false,
            function ($query, $series) {
                $query
                    ->where('series_id', $series);
            }
        );

        $query->when(
            $filters['publisher'] ?? false,
            function ($query, $publisher) {
                $query
                    ->whereIn('series_id', function ($query) use ($publisher) {
                        $query->select('id')
                            ->from('series')
                            ->where('publisher_id', $publisher);
                    });
            }
        );
    }
}
