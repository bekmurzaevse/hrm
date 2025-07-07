<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'title' => '5 chef',
            'budget' => 3000,
            'deadline' => now()->addMonth(),
            'created_by' => User::inRandomOrder()->first()->id,
        ]);
        
        Project::create([
            'title' => '3 designer',
            'budget' => 1500,
            'deadline' => now()->addMonth(),
            'created_by' => User::inRandomOrder()->first()->id,
        ]);
    }
}
