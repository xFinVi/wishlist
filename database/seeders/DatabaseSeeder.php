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

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}

// DATABASE_URL=postgres://wishlist_fly:T6ZrlmHAD15sVjy@wishlist-pg.flycast:5432/wishlist_fly?sslmode=disable
// PS C:\Users\Filip\Herd\sendnotes>