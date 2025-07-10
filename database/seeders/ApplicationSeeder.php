<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\Candidate;
use App\Models\RecruitmentFunnelStage;
use App\Models\Vacancy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Application::create([
            'candidate_id' => Candidate::inRandomOrder()->first()->id,
            'vacancy_id' => Vacancy::inRandomOrder()->first()->id,
            'current_stage' => RecruitmentFunnelStage::inRandomOrder()->first()->id,
            'applied_at' => now(),
        ]);

        Application::create([
            'candidate_id' => Candidate::inRandomOrder()->first()->id,
            'vacancy_id' => Vacancy::inRandomOrder()->first()->id,
            'current_stage' => RecruitmentFunnelStage::inRandomOrder()->first()->id,
            'applied_at' => now()->addDays(3),
        ]);
    }
}
