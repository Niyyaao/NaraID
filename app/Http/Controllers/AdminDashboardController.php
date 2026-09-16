<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Buyer;
use App\Models\Order;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $totaladmins = User::count();
        $totalalbums = Album::count();
        $totalbuyers = Buyer::count();
        $totalorders = Order::count();

        $albumterlaris = Album::select('albums.*')
            ->selectRaw('SUM(orders.qty) as total_terjual')
            ->join('orders', 'orders.album_id', '=', 'albums.id')
            ->whereIn('orders.status', ['verified', 'ready_for_pickup'])
            ->groupBy('albums.id', 'albums.image', 'albums.title', 'albums.artist_name', 'albums.description', 'albums.price', 'albums.stock', 'albums.created_at', 'albums.updated_at')
            ->orderByDesc('total_terjual')
            ->limit('5')
            ->get();

        $albumterbaru = Album::whereNotNull('release_date')->orderByDesc('release_date')->limit(5)->get();

        return view('pages.admin.dashboard', compact('totalalbums', 'totaladmins', 'totalbuyers', 'totalorders', 'albumterlaris', 'albumterbaru'));
    }
}
