<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{
    // Only create the Super Admin if not already exists
    if (!User::where('email', 'cutiepie@test.com')->exists()) {
        User::create([
            'given_name' => 'Baby Nicole',
            'surname' => 'Trinidad',
            'position' => 'Baby ko',
            'email' => 'cutiepie@test.com',
            'password' => bcrypt('babyko'),
            'role' => 'Super Admin',
        ]);
    }

    // Seed content
    $this->call([
        ContentSeeder::class,
    ]);
}
}
