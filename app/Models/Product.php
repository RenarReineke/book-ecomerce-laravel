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

    protected $fillable = ['title', 'description', 'price'];

    protected $with = ['category', 'tags', 'rewiews'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function rewiews()
    {
        return $this->hasMany(Rewiew::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
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
