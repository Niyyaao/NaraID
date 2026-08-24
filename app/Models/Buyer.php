<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
