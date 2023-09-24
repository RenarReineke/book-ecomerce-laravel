<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Like extends Pivot
{
    protected $table = 'likes';

    protected $fillable = ['user_id', 'rewiew_id', 'isPositive'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rewiew()
    {
        return $this->belongsTo(Rewiew::class);
    }
}
