<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            ClientSeeder::class,
            DealsSeeder::class,
            InteractionSeeder::class,
            ProjectSeeder::class,
            VacancySeeder::class,
            HrDocumentSeeder::class,
            HrOrderSeeder::class,
            CourseSeeder::class,
            CourseMaterialSeeder::class,
            CourseAssignmentSeeder::class,
            TestSeeder::class,
            TestResultSeeder::class,
            CandidateSeeder::class,
            CandidateNoteSeeder::class,
            CandidateDocumentSeeder::class,
            RecruitmentFunnelStageSeeder::class,
            ApplicationSeeder::class,
            FunnelLogSeeder::class,
            ReportSeeder::class,
            TaskSeeder::class,
            TelegramLogSeeder::class,
            KpiRecordSeeder::class,
            FinanceSeeder::class,
            TagSeeder::class,
        ]);
    }
}
