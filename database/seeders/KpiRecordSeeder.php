<?php

namespace Database\Seeders;

use App\Models\KpiRecord;
use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KpiRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KpiRecord::create([
            'user_id' => User::inRandomOrder()->first()->id, 
            'vacancy_id' => Vacancy::inRandomOrder()->first()->id, 
            'kpi_score' => 85.50,
            'calculated_at' => now(),
        ]);


        KpiRecord::create([
            'user_id' => User::inRandomOrder()->first()->id, 
            'vacancy_id' => Vacancy::inRandomOrder()->first()->id, 
            'kpi_score' => 92.75,
            'calculated_at' => now()->addDays(1),
        ]);
    }
}
