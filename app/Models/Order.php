<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'buyer_id',
        'album_id',
        'qty',
        'total',
        'status',
    ];

    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
