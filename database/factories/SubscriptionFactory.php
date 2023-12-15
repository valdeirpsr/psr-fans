<?php

namespace Database\Factories;

use App\Enums\PaymentStatus;
use App\Models\Plan;
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
            'customer_name' => fake()->name(),
            'customer_email' => fake()->email(),
            'customer_cpf' => fake()->numerify('###########'),
            'plan_name' => fake()->realTextBetween(10, 25),
            'plan_price' => fake()->randomFloat(2, 10, 90),
            'plan_period' => fake()->randomDigitNotZero(),
            'payment_method' => 'pix',
            'payment_status' => fake()->randomElement(PaymentStatus::cases())->value,
            'total' => fake()->randomFloat(2, 10, 90),
            'expired_at' => fake()->dateTimeBetween('+1 day', '+1 year'),
        ];
    }

    public function expired(): Factory
    {
        return $this->state(fn () => [
            'expired_at' => now()->subDay(),
        ]);
    }

    public function paymentApproved(): Factory
    {
        return $this->state(fn () => [
            'payment_status' => PaymentStatus::APPROVED,
        ]);
    }
}
