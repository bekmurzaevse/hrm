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
        $item = Report::create([
            'title' => 'Monthly Recruitment Report',
            'type' => 'monthly',
            'generated_by' => User::inRandomOrder()->first()->id,
        ]);

        $item->file()->create([
            'name' => 'report.pdf',
            'path' => 'reports/report.pdf',
            'type' => 'application/pdf',
            'size' => 204800,
            'fileable_type' => Report::class,
            'fileable_id' => $item->id,
            'description' => 'Monthly recruitment report for the month of July.',
        ]);
    }
}
