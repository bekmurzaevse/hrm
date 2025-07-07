<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => "Bill",
            'last_name' => "Gates",
            'email' => "bill@gmail.com",
            'phone' => "998971234567",
            'password' => "Secret123",
        ]);

        User::create([
            'first_name' => "Stieve",
            'last_name' => "Jobs",
            'email' => "stieve@gmail.com",
            'phone' => "998971234568",
            'password' => "Secret123",
        ]);
    }
}
