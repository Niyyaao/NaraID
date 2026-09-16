<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Album;
use App\Models\Buyer;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $albums = Album::all();
        $buyer = Buyer::first();

        Order::insert([
            ['buyer_id' => $buyer->id, 'album_id' => $albums[0]->id, 'qty' => 15, 'total' => $albums[0]->price * 15, 'payment_proof' => null, 'status' => 'awaiting_payment', 'created_at' => now(), 'updated_at' => now()],
            ['buyer_id' => $buyer->id, 'album_id' => $albums[0]->id, 'qty' => 10, 'total' => $albums[0]->price * 10, 'payment_proof' => 'payment.jpeg', 'status' => 'awaiting_verification', 'created_at' => now(), 'updated_at' => now()],
            ['buyer_id' => $buyer->id, 'album_id' => $albums[1]->id, 'qty' => 8, 'total' => $albums[1]->price * 8, 'payment_proof' => 'payment.jpeg', 'status' => 'verified', 'created_at' => now(), 'updated_at' => now()],
            ['buyer_id' => $buyer->id, 'album_id' => $albums[2]->id, 'qty' => 5, 'total' => $albums[2]->price * 5, 'payment_proof' => 'payment.jpeg', 'status' => 'ready_for_pickup', 'created_at' => now(), 'updated_at' => now()],
            ['buyer_id' => $buyer->id, 'album_id' => $albums[3]->id, 'qty' => 3, 'total' => $albums[3]->price * 3, 'payment_proof' => 'payment.jpeg', 'status' => 'verified', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
