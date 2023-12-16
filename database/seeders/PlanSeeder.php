<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $one = [
            'name' => '1 Mês - R$10,50',
            'price' => 30,
            'period' => 30,
        ];

        $three = [
            'name' => '3 Meses - R$31,50',
            'price' => 31.5,
            'period' => 90,
        ];

        $six = [
            'name' => '6 Meses - R$63,00',
            'price' => 63,
            'period' => 180,
        ];

        $twelve = [
            'name' => '12 Meses - R$126,00',
            'price' => 126,
            'period' => 365,
        ];

        \App\Models\Plan::factory(4)
            ->state(new Sequence(
                $one,
                $three,
                $six,
                $twelve,
            ))
            ->published()
            ->create();
    }
}
