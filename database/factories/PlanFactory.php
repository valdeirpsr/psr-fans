<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plan>
 */
class PlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->realTextBetween(5, 15),
            'price' => fake()->numerify('##.##'),
            'period' => fake()->randomDigitNotZero(),
            'status' => fake()->randomElement([true, false]),
        ];
    }

    public function enabled(): Factory
    {
        return $this->state(fn () => [
            'status' => true,
        ]);
    }
}
