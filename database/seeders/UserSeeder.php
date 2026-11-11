<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $owner = new \App\Models\User([
            'name' => 'yayaatmin',
            'email' => 'atminnaraid@gmail.com',
            'password' => 'yayaatmin0',
        ]);
        $owner->role = 'owner';
        $owner->save();

        \App\Models\User::factory()->count(4)->create();
    }
}
