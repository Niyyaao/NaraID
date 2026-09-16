<?php

namespace Database\Seeders;

use App\Models\Album;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Album::insert([
            [
                'image' => 'bl7nYJxMWVrNrd3E.jpeg',
                'title' => 'Midnight Echoes',
                'artist_name' => 'Luna Ray',
                'description' => 'A dreamy synth-pop album.',
                'price' => 85000,
                'stock' => 40,
                'release_date' => '2026-08-10',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'image' => 'bl7nYJxMWVrNrd3E.jpeg',
                'title' => 'Golden Hour',
                'artist_name' => 'The Fade',
                'description' => 'Warm acoustic vibes for sunset drives.',
                'price' => 95000,
                'stock' => 25,
                'release_date' => '2025-01-20',
                'created_at' => now(), 'updated_at' => now(),
            ], [
                'image' => 'bl7nYJxMWVrNrd3E.jpeg',
                'title' => 'Neon Static',
                'artist_name' => 'Vex Circuit',
                'description' => 'High-energy electronic beats.',
                'price' => 70000,
                'stock' => 60,
                'release_date' => '2024-06-05',
                'created_at' => now(), 'updated_at' => now(),
            ], [
                'image' => 'bl7nYJxMWVrNrd3E.jpeg',
                'title' => 'Quiet Storm',
                'artist_name' => 'Maren Cole',
                'description' => 'Soulful ballads with a modern twist.',
                'price' => 110000,
                'stock' => 15,
                'release_date' => '2023-11-30',
                'created_at' => now(), 'updated_at' => now(),
            ], [
                'image' => 'bl7nYJxMWVrNrd3E.jpeg',
                'title' => 'Paper Planes & Static Rain',
                'artist_name' => 'Kilo Junction',
                'description' => 'Lo-fi hip hop with jazzy samples.',
                'price' => 65000,
                'stock' => 80,
                'release_date' => '2026-09-01',
                'created_at' => now(), 'updated_at' => now(),
            ]
        ]);
    }
}
