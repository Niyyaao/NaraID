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
            [
                'image' => 'default.jpg',
                'artist_name' => 'CORTIS',
                'title' => 'COLOR OUTSIDE THE LINES',
                'release_date' => '2025-09-08',
                'price' => 295000,
                'stock' => 30,
                'description' => 'CD, photobook 120 halaman, string, film sheet, photocard acak, dan photocard sleeve.',
            ],

            [
                'image' => 'default.jpg',
                'artist_name' => 'CORTIS',
                'title' => 'GREENGREEN',
                'release_date' => '2026-05-04',
                'price' => 310000,
                'stock' => 30,
                'description' => 'CD, photobook 120 halaman, magnet, sticker, scratch card acak, photocard acak, dan sleeve.',
            ],

            [
                'image' => 'default.jpg',
                'artist_name' => 'LNGSHOT',
                'title' => 'SHOT CALLERS',
                'release_date' => '2026-01-13',
                'price' => 275000,
                'stock' => 20,
                'description' => 'Case box, photobook, CD-R, sticker, folded poster, poster sleeve, dan selfie photocard acak.',
            ],

            [
                'image' => 'default.jpg',
                'artist_name' => 'RIIZE',
                'title' => 'Get A Guitar',
                'release_date' => '2023-09-04',
                'price' => 190000,
                'stock' => 15,
                'description' => 'CD-R, photobook 72 halaman, photocard acak, photoprint, dan folded poster.',
            ],

            [
                'image' => 'default.jpg',
                'artist_name' => 'RIIZE',
                'title' => 'RIIZING',
                'release_date' => '2024-06-17',
                'price' => 285000,
                'stock' => 20,
                'description' => 'CD-R, photobook, decoration pack acak, photocard set, dan photocard envelope.',
            ],

            [
                'image' => 'default.jpg',
                'artist_name' => 'RIIZE',
                'title' => 'ODYSSEY',
                'release_date' => '2025-05-19',
                'price' => 340000,
                'stock' => 20,
                'description' => 'Package box, photobook, printed photo book, CD-R, dan folded poster.',
            ],

            [
                'image' => 'default.jpg',
                'artist_name' => 'RIIZE',
                'title' => 'FAME',
                'release_date' => '2025-11-24',
                'price' => 330000,
                'stock' => 25,
                'description' => 'Photobook 48 halaman, QR card, lyric leaflet, postcard acak, photocard acak, dan unit photocard acak.',
            ],

            [
                'image' => 'default.jpg',
                'artist_name' => 'ILLIT',
                'title' => 'SUPER REAL ME',
                'release_date' => '2024-03-25',
                'price' => 265000,
                'stock' => 25,
                'description' => 'Out box, photobook, CD-R, dua photocard acak, ILLIT logo sticker, album logo sticker, sticker, dan paper magnet.',
            ],

            [
                'image' => 'default.jpg',
                'artist_name' => 'BABYMONSTER',
                'title' => 'BABYMONS7ER',
                'release_date' => '2024-04-01',
                'price' => 290000,
                'stock' => 18,
                'description' => 'CD, big photobook 68 halaman, small photobook 36 halaman, clear sticker, accordion postcard, folded poster, dan tiga selfie photocard acak.',
            ],

            [
                'image' => 'default.jpg',
                'artist_name' => 'BABYMONSTER',
                'title' => 'DRIP',
                'release_date' => '2024-11-01',
                'price' => 335000,
                'stock' => 18,
                'description' => 'CD, photobook, tujuh selfie photocard, dan hang tag.',
            ],

            [
                'image' => 'default.jpg',
                'artist_name' => 'BLACKPINK',
                'title' => 'BORN PINK',
                'release_date' => '2022-09-16',
                'price' => 360000,
                'stock' => 12,
                'description' => 'Album fisik BORN PINK tersedia dalam beberapa versi dengan kelengkapan yang berbeda sesuai versi album.',
            ],

            [
                'image' => 'default.jpg',
                'artist_name' => 'BLACKPINK',
                'title' => 'DEADLINE',
                'release_date' => '2026-02-27',
                'price' => 375000,
                'stock' => 15,
                'description' => 'Album fisik DEADLINE tersedia dalam beberapa versi dengan kelengkapan yang berbeda sesuai versi album.',
            ],

            [
                'image' => 'default.jpg',
                'artist_name' => 'NewJeans',
                'title' => 'Get Up',
                'release_date' => '2023-07-21',
                'price' => 285000,
                'stock' => 20,
                'description' => 'CD, CD envelope, outbox, bag, inner box, photobook, lyric book, photocard envelope, photocard, sticker envelope, stickers, postcards, dan bookmark.',
            ],

            [
                'image' => 'default.jpg',
                'artist_name' => 'NewJeans',
                'title' => 'How Sweet',
                'release_date' => '2024-05-24',
                'price' => 215000,
                'stock' => 20,
                'description' => 'Album fisik tersedia dalam Standard Version dan Weverse Albums Version dengan kelengkapan yang berbeda.',
            ],

            [
                'image' => 'default.jpg',
                'artist_name' => 'aespa',
                'title' => 'MY WORLD',
                'release_date' => '2023-05-08',
                'price' => 300000,
                'stock' => 15,
                'description' => 'Mini album fisik MY WORLD dengan beberapa versi album dan kelengkapan yang berbeda sesuai versi.',
            ],

            [
                'image' => 'default.jpg',
                'artist_name' => 'aespa',
                'title' => 'Armageddon',
                'release_date' => '2024-05-27',
                'price' => 330000,
                'stock' => 15,
                'description' => 'Album fisik Armageddon tersedia dalam beberapa versi dengan kelengkapan yang berbeda sesuai versi album.',
            ],

            [
                'image' => 'default.jpg',
                'artist_name' => 'SEVENTEEN',
                'title' => 'FML',
                'release_date' => '2023-04-24',
                'price' => 310000,
                'stock' => 25,
                'description' => 'Album fisik FML tersedia dalam beberapa versi dengan kelengkapan album yang berbeda sesuai versi.',
            ],

            [
                'image' => 'default.jpg',
                'artist_name' => 'SEVENTEEN',
                'title' => 'SPILL THE FEELS',
                'release_date' => '2024-11-18',
                'price' => 320000,
                'stock' => 25,
                'description' => 'Sleeve box, box, photobook 84 halaman, component box, deco sticker, tearing sticker, scratch card, lyric paper, dua photocard acak, folded poster, dan CD-R.',
            ],

            [
                'image' => 'default.jpg',
                'artist_name' => 'Stray Kids',
                'title' => '5-STAR',
                'release_date' => '2023-06-02',
                'price' => 335000,
                'stock' => 30,
                'description' => 'Album fisik 5-STAR tersedia dalam beberapa versi dengan kelengkapan yang berbeda sesuai versi album.',
            ],

            [
                'image' => 'default.jpg',
                'artist_name' => 'Stray Kids',
                'title' => 'ROCK-STAR',
                'release_date' => '2023-11-10',
                'price' => 325000,
                'stock' => 30,
                'description' => 'Album fisik ROCK-STAR tersedia dalam beberapa versi dengan kelengkapan yang berbeda sesuai versi album.',
            ],

            [
                'image' => 'default.jpg',
                'artist_name' => 'IVE',
                'title' => "I'VE MINE",
                'release_date' => '2023-10-13',
                'price' => 280000,
                'stock' => 18,
                'description' => 'Album fisik IVE MINE tersedia dalam beberapa versi dengan kelengkapan yang berbeda sesuai versi album.',
            ],

            [
                'image' => 'default.jpg',
                'artist_name' => 'LE SSERAFIM',
                'title' => 'ANTIFRAGILE',
                'release_date' => '2022-10-17',
                'price' => 285000,
                'stock' => 18,
                'description' => 'Album fisik ANTIFRAGILE tersedia dalam beberapa versi dengan kelengkapan yang berbeda sesuai versi album.',
            ],

            [
                'image' => 'default.jpg',
                'artist_name' => 'LE SSERAFIM',
                'title' => 'EASY',
                'release_date' => '2024-02-19',
                'price' => 290000,
                'stock' => 18,
                'description' => 'Photobook 104 halaman, CD-R, photocard acak, postcard, stickers, folded poster, dan lyric sheet.',
            ],

            [
                'image' => 'default.jpg',
                'artist_name' => 'TWICE',
                'title' => 'READY TO BE',
                'release_date' => '2023-03-10',
                'price' => 305000,
                'stock' => 15,
                'description' => 'Photobook, photocard acak, CD-R, folded poster acak, dan postcard acak.',
            ],

            [
                'image' => 'default.jpg',
                'artist_name' => 'ENHYPEN',
                'title' => 'ROMANCE : UNTOLD',
                'release_date' => '2024-07-12',
                'price' => 315000,
                'stock' => 20,
                'description' => 'Out box, letter, photobook 92 halaman, CD-R, dua photocard acak, sticker, album logo sticker, postcard acak, paper ring, dan poster.',
            ],

            [
                'image' => 'default.jpg',
                'artist_name' => 'TXT',
                'title' => 'The Name Chapter: FREEFALL',
                'release_date' => '2023-10-13',
                'price' => 295000,
                'stock' => 20,
                'description' => 'Package, photobook 80 halaman, CD, lyric poster, photocard, postcard, sticker, dan album logo sticker.',
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
