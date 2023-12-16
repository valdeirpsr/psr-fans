<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subscription>
 */
class SubscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'plan_name' => fake()->text(15),
            'plan_price' => fake()->numerify('##.##'),
            'plan_period' => fake()->randomDigitNotZero(),
            'total' => fake()->numerify('##.##'),
            'expired_at' => fake()->dateTimeBetween('now', '+1 year'),
            'forwarded_ip' => fake()->ipv4(),
            'user_agent' => fake()->userAgent(),
        ];
    }

    public function expired(): Factory
    {
        return $this->state(fn () => [
            'expired_at' => now()->subMonth(),
        ]);
    }
}
