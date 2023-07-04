<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'price'];

    protected $with = ['category'];

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

}
