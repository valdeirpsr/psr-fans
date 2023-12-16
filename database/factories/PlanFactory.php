<?php

namespace Database\Factories;

use App\Enums\PlanStatus;
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
            'name' => fake()->text(20),
            'price' => fake()->numerify('##.##'),
            'period' => fake()->randomDigitNotZero(),
            'status' => fake()->randomElement(PlanStatus::cases()),
        ];
    }

    public function published(): Factory
    {
        return $this->state(fn () => [
            'status' => PlanStatus::PUBLISHED,
        ]);
    }

    public function draft(): Factory
    {
        return $this->state(fn () => [
            'status' => PlanStatus::DRAFT,
        ]);
    }
}
