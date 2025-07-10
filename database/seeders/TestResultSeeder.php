<?php

namespace Database\Seeders;

use App\Models\TestResult;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TestResult::create([
            'test_id' => 1,
            'user_id' => 1,
            'score' => 85,
            'taken_at' => now()->subDays(2),
        ]);

        TestResult::create([
            'test_id' => 1,
            'user_id' => 2,
            'score' => 92,
            'taken_at' => now()->subDay(),
        ]);

        TestResult::create([
            'test_id' => 2,
            'user_id' => 1,
            'score' => 75,
            'taken_at' => now(),
        ]);
    }
}
