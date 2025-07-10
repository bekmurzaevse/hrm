<?php

namespace Database\Seeders;

use App\Models\Test;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Test::create([
            'title' => 'Laravel Test',
            'course_id' => 1,
        ]);

        Test::create([
            'title' => 'PHP OOP Test',
            'course_id' => 1,
        ]);

        Test::create([
            'title' => 'Docker Test',
            'course_id' => 2,
        ]);
    }
}
