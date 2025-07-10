<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\FunnelLog;
use App\Models\RecruitmentFunnelStage;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FunnelLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FunnelLog::create([
            'application_id' => Application::inRandomOrder()->first()->id,
            'stage_id' => RecruitmentFunnelStage::inRandomOrder()->first()->id,
            'moved_at' => now(),
            'moved_by' => User::inRandomOrder()->first()->id,
        ]);

        FunnelLog::create([
            'application_id' => Application::inRandomOrder()->first()->id,
            'stage_id' => RecruitmentFunnelStage::inRandomOrder()->first()->id,
            'moved_at' => now()->addDays(2),
            'moved_by' => User::inRandomOrder()->first()->id,
        ]);
    }
}
