<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Album;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::all();
        return view('pages.buyer.album.index', compact('albums'));
    }

    public function show(string $id)
    {
    //
    }
}
