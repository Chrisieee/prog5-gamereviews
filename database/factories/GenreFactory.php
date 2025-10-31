<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genre>
 */
class GenreFactory extends Factory
{
    private array $genres = [
        'Action', 'Platform', 'FPS', 'Hero shooter', 'Fighting', 'Stealth',
        'Survival', 'Rhythm', 'Battle Royal', 'Adventure', 'Puzzle', 'RPG',
        'Roguelikes', 'Simulator', 'Strategy', 'Sports'
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        foreach ($this->genres as $genre) {
            DB::table('genres')->insert(['name' => $genre]);
        }
    }
}
