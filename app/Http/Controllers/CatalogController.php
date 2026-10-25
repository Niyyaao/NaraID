<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use Illuminate\Contracts\Encryption\DecryptException;


class CatalogController extends Controller
{
    public function show(string $id)
    {
        try {
            $id = decrypt($id);
        } catch (DecryptException $e) {
            abort(404);
        }

        $album = Album::findOrFail($id);
        return view('pages.catalog.show', compact('album'));
    }
}
