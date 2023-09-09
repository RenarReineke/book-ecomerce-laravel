<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['message', 'rewiew_id', 'user_id'];

    public function rewiew()
    {
        return $this->belongsTo(Rewiew::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
