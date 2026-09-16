<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Order;

class BuyerDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:buyer');
    }

    public function index()
    {
        $buyer = auth('buyer')->user();

        // Total order keseluruhan milik buyer ini
        $totalorder = Order::where('buyer_id', $buyer->id)->count();

        // Awaiting Payment -> asumsi status "pending"
        $awaitingpayment = Order::where('buyer_id', $buyer->id)
            ->where('status', 'awaiting_payment')
            ->count();

        // Ready for Pickup
        $readyforpickup = Order::where('buyer_id', $buyer->id)
            ->where('status', 'ready_for_pickup')
            ->count();

        // Finished -> asumsi status "done"/"completed"
        $finished = Order::where('buyer_id', $buyer->id)
            ->where('status', 'finished')
            ->count();

        // List Album Terlaris (global, sama kayak di admin)
        $albumterlaris = Album::select('albums.*')
            ->selectRaw('SUM(orders.qty) as total_terjual')
            ->join('orders', 'orders.album_id', '=', 'albums.id')
            ->whereIn('orders.status', ['verified', 'ready_for_pickup'])
            ->groupBy('albums.id', 'albums.image', 'albums.title', 'albums.artist_name', 'albums.description', 'albums.price', 'albums.stock', 'albums.created_at', 'albums.updated_at')
            ->orderByDesc('total_terjual')
            ->limit(5)
            ->get();

        // List Album Terbaru
        $albumterbaru = Album::whereNotNull('release_date')
            ->orderByDesc('release_date')
            ->limit(5)
            ->get();

        return view('pages.buyer.dashboard', compact(
            'totalorder',
            'awaitingpayment',
            'readyforpickup',
            'finished',
            'albumterlaris',
            'albumterbaru'
        ));
    }
}