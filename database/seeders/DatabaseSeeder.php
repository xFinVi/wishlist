<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Note;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a specific test user
        $testUser = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Create notes for the test user
        Note::factory()->count(10)->for($testUser)->create();

        //     // Create additional users and their notes
        // User::factory(10)->has(Note::factory()->count(5))->create();
    }
}
