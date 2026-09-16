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
        'release_date'
    ];

    protected $casts = [
        'release_date' => 'date'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
