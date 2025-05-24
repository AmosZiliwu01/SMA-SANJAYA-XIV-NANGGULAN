<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gallery>
 */
class GalleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'image' => $this->faker->imageUrl(640, 480, 'nature', true),
            'album_id' => \App\Models\Album::inRandomOrder()->first()->id ?? \App\Models\Album::factory(), // Ambil ID album acak atau buat baru jika belum ada
            'user_id' => \App\Models\User::inRandomOrder()->first()->id ?? \App\Models\User::factory(), // Lebih aman daripada hardcode
        ];
    }
}
