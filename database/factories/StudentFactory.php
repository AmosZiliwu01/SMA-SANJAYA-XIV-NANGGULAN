<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nis' => $this->faker->unique()->numerify('##########'),
            'name' => $this->faker->name(),
            'gender' => $this->faker->randomElement(['M', 'F']),
            'class_id' => \App\Models\Classes::inRandomOrder()->first()->id ?? null,
            'photo' => $this->faker->optional()->imageUrl(640, 480, 'people', true),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
