<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'given_name' => 'Baby Nicole',
            'surname' => 'Trinidad',
            'position' => 'Baby ko',
            'email' => 'cutiepie@test.com',
            'password' => ('babyko'),
            'role' => 'Super Admin',
        ]);
    }
}