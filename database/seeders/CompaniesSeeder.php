<?php

namespace Database\Seeders;

use App\Models\Companies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Companies::create([
            'user_id' => 3,
            'name' => 'DragonPay PH',
            'tagline' => 'Sample Tagline',
            'description' => 'Sample Description',
        ]);

        Companies::create([
            'user_id' => 4,
            'name' => 'Astro Robotics PH',
            'tagline' => 'Sample Tagline',
            'description' => 'Sample Description',
        ]);

        Companies::create([
            'user_id' => 5,
            'name' => 'Massive Integated Technologies Inc. PH',
            'tagline' => 'Sample Tagline',
            'description' => 'Sample Description',
        ]);
    }
}
