<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with(['buyer', 'album'])->latest()->get();
        return view('pages.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::with(['buyer', 'album'])->findOrFail(decrypt($id));
        return view('pages.order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::with(['buyer', 'album'])->findOrFail(decrypt($id));

        return view('pages.order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::findOrFail(decrypt($id));

        $request->validate([
            'status' => 'required|in:awaiting_payment,awaiting_verification,verified,ready_for_pickup,finished',
        ]);

        $order->update(['status' => $request->status]);

        return redirect()->route('admin.order.index')->with('success', 'Order Status Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail(decrypt($id));

        if ($order->payment_proof && \Storage::disk('public')->exists('orders/' . $order->payment_proof)) {
            \Storage::disk('public')->delete('orders/' . $order->payment_proof);
        }

        $order->delete();

        return redirect()->route('admin.order.index')->with('success', 'Deleted Order Succesfully');
    }
}
