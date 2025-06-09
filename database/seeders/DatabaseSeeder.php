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
    if (!User::where('email', 'test@test.com')->exists()) {
        User::create([
            'given_name' => 'Test',
            'surname' => 'Test',
            'position' => 'Partner',
            'email' => 'test@test.com',
            'password' => bcrypt('test123'),
            'role' => 'Super Admin',
        ]);
    }

    // Seed content
    $this->call([
        ContentSeeder::class,
    ]);
}
}
