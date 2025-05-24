<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'gender' => $this->faker->randomElement(['L', 'P']),
            'nip' => $this->faker->unique()->numerify('###########'),
            'mapel' => $this->faker->randomElement(['Matematika', 'Bahasa Inggris', 'IPA', 'IPS']),
            'photo' => $this->faker->imageUrl(640, 480, 'people', true),
            'phone' => $this->faker->unique()->phoneNumber(),
        ];
    }
}
