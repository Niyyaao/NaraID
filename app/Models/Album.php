<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'image',
        'title',
        'artist_name',
        'description',
        'price',
        'stock',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
