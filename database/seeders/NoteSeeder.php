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
    protected $model = Note::class;

    /**
     * Define the model's default state.
     */
    public function definition()
    {
        Note::create([
            'user_id' => 1,
            'title' => 'ASDas',
            'body' => 'asdasdasdasdasdas',
            'recipient' => 'your@mgila.com',
            'send_date' => '2024-08-20',
            'is_published' => false,
            'heart_count' => 0,
        ]);
    }
}
