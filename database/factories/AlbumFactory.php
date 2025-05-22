<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Album>
 */
class AlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'user_id' => \App\Models\User::inRandomOrder()->first()->id ?? null,
            'author' => $this->faker->name(),
            'photo_count' => $this->faker->numberBetween(1, 100),
            'cover_photo' => $this->faker->imageUrl(),
        ];
    }
}
