<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agenda>
 */
class AgendaFactory extends Factory
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
            'date' => $this->faker->date(),
            'description' => $this->faker->paragraph(),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'place' => $this->faker->address(),
            'time' => $this->faker->time(),
            'note' => $this->faker->paragraph(),
            'author' => $this->faker->name(),
            'user_id' => \App\Models\User::inRandomOrder()->value('id') ?? \App\Models\User::factory()->create()->id,
        ];
    }
}
