<?php

namespace App\Models;

use App\Enums\RoleEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    protected $casts = [
        'title' => RoleEnum::class,
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
