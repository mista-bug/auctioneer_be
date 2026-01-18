<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Collection>
 */
class CollectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event_id' => fake()->uuid(),
            'name' => fake()->firstName() . "'s Gallery",
            'start_date' => fake()->date(),
            'end_date' => fake()->date(),
            'location' => fake()->country(),
            'address' => fake()->address(),
            'description' => fake()->sentence(10),
            'organizer_id' => User::all()->random()->first()->id,
        ];
    }
}
