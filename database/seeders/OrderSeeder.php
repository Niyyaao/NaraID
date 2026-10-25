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
        $buyerIds = Buyer::pluck('id');
        $albums = Album::all();

        if ($buyerIds->isEmpty() || $albums->isEmpty()) {
            $this->command->error('Buyer atau album masih kosong. Isi dulu sebelum seed order.');
            return;
        }

        // Tiap status dapat beberapa order supaya semua tampilan terisi
        $statuses = [
            'awaiting_payment'      => 3,
            'awaiting_verification' => 4,
            'verified'              => 3,
            'ready_for_pickup'      => 3,
            'finished'              => 6,
            'cancelled'             => 3,
        ];

        $i = 0;

        foreach ($statuses as $status => $count) {
            for ($n = 0; $n < $count; $n++) {
                $album = $albums[$i % $albums->count()];
                $qty = ($i % 5) + 1; // 1 sampai 5

                // Belum bayar atau dibatalkan = belum ada bukti transfer
                $hasProof = ! in_array($status, ['awaiting_payment', 'cancelled']);

                Order::create([
                    'buyer_id'      => $buyerIds[$i % $buyerIds->count()],
                    'album_id'      => $album->id,
                    'qty'           => $qty,
                    'total'         => $album->price * $qty,
                    'status'        => $status,
                    'payment_proof' => $hasProof ? 'orders/sample.png' : null,
                    'created_at'    => now()->subDays(22 - $i),
                    'updated_at'    => now()->subDays(22 - $i),
                ]);

                $i++;
            }
        }
    }
}
