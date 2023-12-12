<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plan::factory()->enabled()->create([
            'name' => '1 Mês - R$49,90',
            'price' => 49.9,
            'period' => 30,
        ]);

        Plan::factory()->enabled()->create([
            'name' => '3 Mêses - R$42,00',
            'price' => 42,
            'period' => 90,
        ]);

        Plan::factory()->enabled()->create([
            'name' => '6 Mêses - R$37,00',
            'price' => 37,
            'period' => 180,
        ]);

        Plan::factory()->enabled()->create([
            'name' => '12 Mêses - R$35,00',
            'price' => 35,
            'period' => 365,
        ]);
    }
}
