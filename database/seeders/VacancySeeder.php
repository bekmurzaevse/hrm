<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VacancySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vacancy::create([
            'title' => 'Developer',
            'requirements' => 'Middle',
            'salary' => 1000,
            'deadline' => now()->addMonth(),
            'recruiter_id' => User::inRandomOrder()->first()->id,
            'project_id' => Project::inRandomOrder()->first()->id,
            'description' => 'Description',
        ]);
        
        Vacancy::create([
            'title' => 'Designer',
            'requirements' => 'Middle',
            'salary' => 500,
            'deadline' => now()->addMonth(),
            'recruiter_id' => User::inRandomOrder()->first()->id,
            'project_id' => Project::inRandomOrder()->first()->id,
            'description' => 'Description',
        ]);
    }
}
