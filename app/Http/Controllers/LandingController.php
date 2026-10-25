<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;

class LandingController extends Controller
{
    public function index()
    {
        $albums = Album::latest()->get();
        return view('welcome', compact('albums'));
    }
}
