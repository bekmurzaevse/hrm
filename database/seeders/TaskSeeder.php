<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::create([
            'assigned_to' => User::inRandomOrder()->first()->id,
            'title' => 'Complete project documentation',
            'description' => 'Ensure all project documentation is up to date and accessible.',
            'due_date' => now()->addDays(7),
            'status' => 'pending',
            'created_by' => User::inRandomOrder()->first()->id,
        ]);

        Task::create([
            'assigned_to' => User::inRandomOrder()->first()->id,
            'title' => 'Review project requirements',
            'description' => 'Assess the project requirements to ensure they are clear and complete.',
            'due_date' => now()->addDays(7),
            'status' => 'in_progress',
            'created_by' => User::inRandomOrder()->first()->id,
        ]);
    }
}
