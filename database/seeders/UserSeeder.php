<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // <--- ADD THIS LINE
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a specific Admin user you can use to log in
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('user12345'), // Always hash passwords!
            'role' => 'admin', 
        ]);

        User::create([
            'name' => 'Applicant',
            'email' => 'applicant@gmail.com',
            'password' => Hash::make('user12345'), // Always hash passwords!
            'role' => 'applicant', 
        ]);

        User::create([
            'name' => 'Employer',
            'email' => 'employer@gmail.com',
            'password' => Hash::make('user12345'), // Always hash passwords!
            'role' => 'employer', 
        ]);

    }
}
