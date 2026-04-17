<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Workjob;;
use App\Models\Companies;

class WorkjobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Workjob::create([
            'company_id' => 1,
            'title' => 'Laravel Developer',
            'description' => 'We need a pro at Eloquent and Blade.',
            'salary' => '5000',
            'location' => 'Remote',
            'status' => 'open'
        ]);

        Workjob::create([
            'company_id' => 2,
            'title' => 'Network Admin',
            'description' => 'Basic Knowledge in networking and cables',
            'salary' => '20,000',
            'location' => 'Onsite',
            'status' => 'open'
        ]);

        Workjob::create([
            'company_id' => 3,
            'title' => 'Customer Support Specialist',
            'description' => 'This is sample description for CSS',
            'salary' => '18,000',
            'location' => 'Hybrid',
            'status' => 'closed'
        ]);

        Workjob::create([
            'company_id' => 4,
            'title' => 'DevOps',
            'description' => 'This is sample description for DevOps',
            'salary' => '18,000',
            'location' => 'Hybrid',
            'status' => 'open'
        ]);
    }
}
