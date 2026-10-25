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
        $albums = [
            // Rookie / new releases
            [
                'artist_name' => 'CORTIS',
                'title' => 'COLOR OUTSIDE THE LINES',
                'release_date' => '2025-09-08',
                'price' => 295000,
                'stock' => 30,
                'image' => 'default.jpg',
                'description' => 'CD, 120-page photobook, string, film sheet, random photocard, and photocard sleeve.',
            ],

            [
                'artist_name' => 'CORTIS',
                'title' => 'GREENGREEN',
                'release_date' => '2026-05-04',
                'price' => 310000,
                'stock' => 30,
                'image' => 'default.jpg',
                'description' => 'CD, 120-page photobook, magnet, sticker, random scratch card, random photocard, and sleeve.',
            ],

            [
                'artist_name' => 'LNGSHOT',
                'title' => 'SHOT CALLERS',
                'release_date' => '2026-01-13',
                'price' => 275000,
                'stock' => 20,
                'image' => 'default.jpg',
                'description' => 'Case box, photobook, CD-R, sticker, folded poster, poster sleeve, and random selfie photocard.',
            ],

            [
                'artist_name' => 'RIIZE',
                'title' => 'Get A Guitar',
                'release_date' => '2023-09-04',
                'price' => 190000,
                'stock' => 15,
                'image' => 'default.jpg',
                'description' => 'CD-R, 72-page photobook, random photocard, photoprint, and folded poster.',
            ],

            [
                'artist_name' => 'RIIZE',
                'title' => 'RIIZING',
                'release_date' => '2024-06-17',
                'price' => 285000,
                'stock' => 20,
                'image' => 'default.jpg',
                'description' => 'CD-R, photobook, random decoration pack, photocard set, and photocard envelope.',
            ],

            [
                'artist_name' => 'RIIZE',
                'title' => 'ODYSSEY',
                'release_date' => '2025-05-19',
                'price' => 340000,
                'stock' => 20,
                'image' => 'default.jpg',
                'description' => 'Package box, photobook, printed photo book, CD-R, and folded poster.',
            ],

            [
                'artist_name' => 'RIIZE',
                'title' => 'FAME',
                'release_date' => '2025-11-24',
                'price' => 330000,
                'stock' => 25,
                'image' => 'default.jpg',
                'description' => '48-page photobook, QR card, lyric leaflet, random postcard, random photocard, and random unit photocard.',
            ],

            [
                'artist_name' => 'ILLIT',
                'title' => 'SUPER REAL ME',
                'release_date' => '2024-03-25',
                'price' => 265000,
                'stock' => 25,
                'image' => 'default.jpg',
                'description' => 'Out box, photobook, CD-R, two random photocards, ILLIT logo sticker, album logo sticker, sticker, and paper magnet.',
            ],

            [
                'artist_name' => 'BABYMONSTER',
                'title' => 'BABYMONS7ER',
                'release_date' => '2024-04-01',
                'price' => 290000,
                'stock' => 18,
                'image' => 'default.jpg',
                'description' => 'CD, 68-page big photobook, 36-page small photobook, clear sticker, accordion postcard, folded poster, and three random selfie photocards.',
            ],

            [
                'artist_name' => 'BABYMONSTER',
                'title' => 'DRIP',
                'release_date' => '2024-11-01',
                'price' => 335000,
                'stock' => 18,
                'image' => 'default.jpg',
                'description' => 'CD, photobook, seven selfie photocards, and hang tag.',
            ],

            // Popular groups
            [
                'artist_name' => 'BLACKPINK',
                'title' => 'BORN PINK',
                'release_date' => '2022-09-16',
                'price' => 360000,
                'stock' => 12,
                'image' => 'default.jpg',
                'description' => 'The physical album is available in multiple versions with different inclusions depending on the version.',
            ],

            [
                'artist_name' => 'BLACKPINK',
                'title' => 'DEADLINE',
                'release_date' => '2026-02-27',
                'price' => 375000,
                'stock' => 15,
                'image' => 'default.jpg',
                'description' => 'The physical album is available in multiple versions with different inclusions depending on the version.',
            ],

            [
                'artist_name' => 'NewJeans',
                'title' => 'Get Up',
                'release_date' => '2023-07-21',
                'price' => 285000,
                'stock' => 20,
                'image' => 'default.jpg',
                'description' => 'CD, CD envelope, out box, bag, inner box, photobook, lyric book, photocard envelope, photocard, sticker envelope, stickers, postcards, and bookmark.',
            ],

            [
                'artist_name' => 'NewJeans',
                'title' => 'How Sweet',
                'release_date' => '2024-05-24',
                'price' => 215000,
                'stock' => 20,
                'image' => 'default.jpg',
                'description' => 'The physical album is available in Standard Version and Weverse Albums Version with different inclusions.',
            ],

            [
                'artist_name' => 'aespa',
                'title' => 'MY WORLD',
                'release_date' => '2023-05-08',
                'price' => 300000,
                'stock' => 15,
                'image' => 'default.jpg',
                'description' => 'The physical album is available in multiple versions with different inclusions depending on the version.',
            ],

            [
                'artist_name' => 'aespa',
                'title' => 'Armageddon',
                'release_date' => '2024-05-27',
                'price' => 330000,
                'stock' => 15,
                'image' => 'default.jpg',
                'description' => 'The physical album is available in multiple versions with different inclusions depending on the version.',
            ],

            [
                'artist_name' => 'SEVENTEEN',
                'title' => 'FML',
                'release_date' => '2023-04-24',
                'price' => 310000,
                'stock' => 25,
                'image' => 'default.jpg',
                'description' => 'The physical album is available in multiple versions with different inclusions depending on the version.',
            ],

            [
                'artist_name' => 'SEVENTEEN',
                'title' => 'SPILL THE FEELS',
                'release_date' => '2024-11-18',
                'price' => 320000,
                'stock' => 25,
                'image' => 'default.jpg',
                'description' => 'Sleeve box, box, 84-page photobook, component box, deco sticker, tearing sticker, scratch card, lyric paper, two random photocards, folded poster, and CD-R.',
            ],

            [
                'artist_name' => 'Stray Kids',
                'title' => '5-STAR',
                'release_date' => '2023-06-02',
                'price' => 335000,
                'stock' => 30,
                'image' => 'default.jpg',
                'description' => 'The physical album is available in multiple versions with different inclusions depending on the version.',
            ],

            [
                'artist_name' => 'Stray Kids',
                'title' => 'ROCK-STAR',
                'release_date' => '2023-11-10',
                'price' => 325000,
                'stock' => 30,
                'image' => 'default.jpg',
                'description' => 'The physical album is available in multiple versions with different inclusions depending on the version.',
            ],

            [
                'artist_name' => 'IVE',
                'title' => "I'VE MINE",
                'release_date' => '2023-10-13',
                'price' => 280000,
                'stock' => 18,
                'image' => 'default.jpg',
                'description' => 'The physical album is available in multiple versions with different inclusions depending on the version.',
            ],

            [
                'artist_name' => 'LE SSERAFIM',
                'title' => 'ANTIFRAGILE',
                'release_date' => '2022-10-17',
                'price' => 285000,
                'stock' => 18,
                'image' => 'default.jpg',
                'description' => 'The physical album is available in multiple versions with different inclusions depending on the version.',
            ],

            [
                'artist_name' => 'LE SSERAFIM',
                'title' => 'EASY',
                'release_date' => '2024-02-19',
                'price' => 290000,
                'stock' => 18,
                'image' => 'default.jpg',
                'description' => '104-page photobook, CD-R, random photocard, postcard, stickers, folded poster, and lyric sheet.',
            ],

            [
                'artist_name' => 'TWICE',
                'title' => 'READY TO BE',
                'release_date' => '2023-03-10',
                'price' => 305000,
                'stock' => 15,
                'image' => 'default.jpg',
                'description' => 'Photobook, random photocard, CD-R, random folded poster, and random postcard.',
            ],

            [
                'artist_name' => 'ENHYPEN',
                'title' => 'ROMANCE : UNTOLD',
                'release_date' => '2024-07-12',
                'price' => 315000,
                'stock' => 20,
                'image' => 'default.jpg',
                'description' => 'Out box, letter, 92-page photobook, CD-R, two random photocards, sticker, album logo sticker, random postcard, paper ring, and poster.',
            ],

            [
                'artist_name' => 'TXT',
                'title' => 'The Name Chapter: FREEFALL',
                'release_date' => '2023-10-13',
                'price' => 295000,
                'stock' => 20,
                'image' => 'default.jpg',
                'description' => 'Package, 80-page photobook, CD, lyric poster, photocard, postcard, sticker, and album logo sticker.',
            ],
        ];

        foreach ($albums as $album) {
            Album::firstOrCreate(
                [
                    'artist_name' => $album['artist_name'],
                    'title' => $album['title'],
                ],
                $album,
            );
        }
    }
}
