<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');

        $orders = Order::with('album')
            ->where('buyer_id', auth()->id())
            ->when($status, fn($q) => $q->where('status', $status))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('pages.buyer.order.index', compact('orders', 'status'));
    }

    public function create()
    {
        $albums = Album::where('stock', '>', 0)->get();

        return view('pages.buyer.order.create', compact('albums'));
    }

    public function show(string $id)
    {
        $order = Order::with('album')->findOrFail(decrypt($id));

        return view('pages.buyer.order.show', compact('order'));
    }

    public function createFromAlbum($id)
    {
        $fromalbum = Album::findOrFail(decrypt($id));

        return view('pages.buyer.order.create', compact('fromalbum'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'album_id' => ['required', 'exists:albums,id'],
            'qty' => ['required', 'integer', 'min:1'],
        ]);

        $order = DB::transaction(function () use ($validated) {
            // lockForUpdate prevents overselling when two buyers order at the same time
            $album = Album::lockForUpdate()->findOrFail($validated['album_id']);

            if ($album->stock < $validated['qty']) {
                throw ValidationException::withMessages([
                    'qty' => "Not enough stock. Remaining stock: {$album->stock}.",
                ]);
            }

            $album->decrement('stock', $validated['qty']);

            return Order::create([
                'buyer_id' => auth()->id(),
                'album_id' => $album->id,
                'qty' => $validated['qty'],
                'total' => $album->price * $validated['qty'],
                'status' => 'awaiting_payment',
            ]);
        });

        return redirect()
            ->route('buyer.order.payment', encrypt($order->id))
            ->with('success', 'Order created successfully. Please complete your payment within 24 hours.');
    }

    public function payment($id)
    {
        $order = Order::with('album')
            ->where('buyer_id', auth()->id())
            ->findOrFail(decrypt($id));

        return view('pages.buyer.order.payment', compact('order'));
    }

    public function uploadPayment(Request $request, $id)
    {
        $order = Order::where('buyer_id', auth()->id())->findOrFail(decrypt($id));

        // only orders that are still waiting for payment / verification can receive a proof
        if (!in_array($order->status, ['awaiting_payment', 'awaiting_verification'])) {
            return back()->withErrors(['payment_proof' => 'This order can no longer receive a payment proof.']);
        }

        $request->validate([
            'payment_proof' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        // replace the old proof if the buyer uploads again
        if ($order->payment_proof) {
            Storage::disk('public')->delete('orders/' . $order->payment_proof);
        }

        $file = $request->file('payment_proof');
        $filename = Str::random(16) . '.' . $file->extension();
        $file->storeAs('orders', $filename, 'public');

        $order->update([
            'payment_proof' => $filename,
            'status' => 'awaiting_verification',
        ]);

        return redirect()->route('buyer.order.index')->with('success', 'Payment proof uploaded. Please wait for admin verification.');
    }
}
