<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bicycle extends Model
{
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'user_id',
        'brand',
        'model',
        'color',
        'price',
    ];
}
