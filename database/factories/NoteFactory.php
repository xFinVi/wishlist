<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Note;
use App\Models\User;

class NoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */


    /**
     * Define the model's default state.
     */
    public function definition()
    {
        return [
            'id' => $this->faker->uuid,
            'user_id' => User::factory(),
            'title' => $this->faker->jobTitle,
            'body' => $this->faker->paragraph,
            'send_date' => $this->faker->date,
            'is_published' => $this->faker->boolean,
            'heart_count' => $this->faker->numberBetween(0, 100),
        ];
    }
}
