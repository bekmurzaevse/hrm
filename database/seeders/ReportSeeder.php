<?php

namespace Database\Seeders;

use App\Models\Report;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Report::create([
            'title' => 'Monthly Recruitment Report',
            'type' => 'monthly',
            'generated_by' => User::inRandomOrder()->first()->id,
            'file_path' => 'reports/report.pdf',
        ]);
    }
}
