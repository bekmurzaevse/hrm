<?php

namespace Database\Seeders;

use App\Models\RecruitmentFunnelStage;
use App\Models\Vacancy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecruitmentFunnelStageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RecruitmentFunnelStage::create([
            'vacancy_id' => Vacancy::inRandomOrder()->first()->id,
            'stage_name' => 'Application Received',
            'order' => 1,
        ]);

        RecruitmentFunnelStage::create([
            'vacancy_id' => Vacancy::inRandomOrder()->first()->id,
            'stage_name' => 'Screening',
            'order' => 2,
        ]);
    }
}
