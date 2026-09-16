<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BuyerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Buyer::create([
            'name' => 'Yaya',
            'email' => 'yaya@gmail.com',
            'phone' => '085898282334',
            'password' => 'yayaya123'
        ]);
        
        \App\Models\Buyer::factory()->count(9)->create();
    }
}
