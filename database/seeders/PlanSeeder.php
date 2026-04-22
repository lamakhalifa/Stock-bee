<?php

namespace Database\Seeders;

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    public function run(): void
    {
        Plan::create([
            'name' => 'الأساسية',
            'price' => 775
        ]);

        Plan::create([
            'name' => 'المتقدمة',
            'price' => 1280
        ]);

        Plan::create([
            'name' => 'الكاملة',
            'price' => 1800
        ]);
    }
}
