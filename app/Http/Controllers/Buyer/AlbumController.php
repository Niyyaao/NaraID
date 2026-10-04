<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Album;

class AlbumController extends Controller
{
    public function index(Request $request)
    {
        $query = Album::query()
            ->when($request->filled('q'), function ($q) use ($request) {
                $keyword = $request->q;
                $q->where(function ($sub) use ($keyword) {
                    $sub->where('title', 'like', "%{$keyword}%")
                        ->orWhere('artist_name', 'like', "%{$keyword}%");
                });
            })
            ->when($request->filled('artist'), fn($q) => $q->where('artist_name', $request->artist))
            ->when($request->filled('min_price'), fn($q) => $q->where('price', '>=', (int) $request->min_price))
            ->when($request->filled('max_price'), fn($q) => $q->where('price', '<=', (int) $request->max_price))
            ->when($request->boolean('in_stock'), fn($q) => $q->where('stock', '>', 0))
            ->orderByRaw('stock <= 0'); // sold out selalu di bawah

        match ($request->sort) {
            'price_asc'  => $query->orderBy('price'),
            'price_desc' => $query->orderByDesc('price'),
            'title'      => $query->orderBy('title'),
            default      => $query->latest(),
        };

        $albums  = $query->paginate(12)->withQueryString();
        $artists = Album::select('artist_name')->distinct()->orderBy('artist_name')->pluck('artist_name');

        return view('pages.buyer.album.index', compact('albums', 'artists'));
    }

    public function show(string $id)
    {
        $album = Album::findOrFail(decrypt($id));
        return view('pages.buyer.album.show', compact('album'));
    }
}
