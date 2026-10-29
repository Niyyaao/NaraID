<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    public const BUYER_CANCEL_REASONS = ['I changed my mind', 'I ordered the wrong album or quantity', 'I found a better price elsewhere', 'I cannot complete the payment in time', 'I had a problem with the payment'];

    public const ADMIN_CANCEL_REASONS = ['Payment was not received', 'Payment proof is invalid or unclear', 'Album is no longer available', 'Duplicate or mistaken order', 'Requested by the buyer'];

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
