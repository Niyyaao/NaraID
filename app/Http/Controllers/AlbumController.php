<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::all();
        return view('pages.album.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.album.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|file|mimes:jpg,jpeg,png,webp|max:2048',
            'title' => 'required|max:128|string',
            'artist_name' => 'required|string|max:64',
            'description' => 'nullable',
            'price' => 'required|integer|min:0',
            'stock' => 'required|numeric|min:0',
            'release_date' => 'nullable|date',
        ]);

        $image = $request->file('image');

        $imageName = Str::random(16) . '.' . $image->getClientOriginalExtension();

        $image->storeAs('albums', $imageName, 'public');

        $album = Album::create([
            'image' => $imageName,
            'title' => $request->title,
            'artist_name' => $request->artist_name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'release_date' => $request->release_date,
        ]);

        return redirect()->route('admin.album.index')->with('success', 'Album Created Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $album = Album::findOrFail(decrypt($id));
        return view('pages.album.show', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $album = Album::findOrFail(decrypt($id));
        return view('pages.album.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $album = Album::findOrFail(decrypt($id));

        $request->validate([
            'image' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
            'title' => 'required|max:128|string',
            'artist_name' => 'required|string|max:64',
            'description' => 'nullable',
            'price' => 'required|integer|min:0',
            'stock' => 'required|numeric|min:0',
            'release_date' => 'nullable|date',
        ]);

        $album->title = $request->title;
        $album->artist_name = $request->artist_name;
        $album->description = $request->description;
        $album->price = $request->price;
        $album->stock = $request->stock;
        $album->release_date = $request->release_date;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::random(16) . '.' . $image->getClientOriginalExtension();

            $image->storeAs('albums', $imageName, 'public');

            // simpan ke db
            $album->image = $imageName;
        }

        $album->save();

        return redirect()->route('admin.album.index')->with('success', 'Album Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $album = Album::findOrFail(decrypt($id));
        $album->destroy();

        return redirect()->route('admin.album.index')->with('success', 'Album Successfully Deleted');
    }
}
