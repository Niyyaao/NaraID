<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected $fillable = ['buyer_id', 'album_id', 'qty', 'total', 'status', 'payment_proof', 'cancel_reason', 'cancelled_by', 'cancelled_at'];

    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    public function cancel(array $allowedStatuses = ['awaiting_payment', 'awaiting_verification'], string $by = 'system', ?string $reason = null): bool
    {
        $cancelled = DB::transaction(function () use ($allowedStatuses, $by, $reason) {
            $order = static::lockForUpdate()->find($this->id);

            // sekaligus mencegah dobel cancel, karena 'cancelled' tidak ada di daftar
            if (!$order || !in_array($order->status, $allowedStatuses)) {
                return false;
            }

            Album::where('id', $order->album_id)->increment('stock', $order->qty);
            $order->update([
                'status' => 'cancelled',
                'cancel_reason' => $reason,
                'cancelled_by' => $by,
                'cancelled_at' => now(),
            ]);

            return true;
        });

        if ($cancelled) {
            $this->refresh(); // supaya $this->status ikut 'cancelled'
        }

        return $cancelled;
    }
}
