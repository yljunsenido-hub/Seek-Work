<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Application;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Application::create([
            'job_id' => 1,
            'user_id' => 2,
            'status' => 'accepted',
        ]);

        Application::create([
            'job_id' => 2,
            'user_id' => 2,
            'status' => 'rejected',
        ]);

        Application::create([
            'job_id' => 3,
            'user_id' => 2,
            'status' => 'pending',
        ]);

        
    }
}
