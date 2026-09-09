<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Album;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $album = Album::find(1);

        Order::create([
            'buyer_id' => 1,
            'album_id' => $album->id,
            'qty' => 2,
            'total' => $album->price * 2,
            'status' => 'Awaited Payment',
        ]);
    }
}
