<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('orders:cancel-expired')]
#[Description('Cancel orders unpaid for more than 24 hours and restore their stock')]
class CancelExpiredOrders extends Command
{
    public function handle()
    {
        $count = 0;

        Order::where('status', 'awaiting_payment')
            ->where('created_at', '<', now()->subDay())
            ->each(function ($order) use (&$count) {
                if ($order->cancel(['awaiting_payment'])) {
                    $count++;
                }
            });

        $this->info("{$count} order(s) cancelled.");
    }
}
