<?php

namespace Database\Seeders;

use App\Models\CandidateDocument;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidateDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CandidateDocument::create([
            'candidate_id' => 1,
            'type' => 'CV',
            'file_url' => 'documents/aybek_cv.pdf',
            'uploaded_at' => now()->subDays(3),
        ]);

        CandidateDocument::create([
            'candidate_id' => 2,
            'type' => 'Diploma',
            'file_url' => 'documents/zina.jpg',
            'uploaded_at' => now()->subDays(2),
        ]);

        CandidateDocument::create([
            'candidate_id' => 3,
            'type' => 'Portfolio',
            'file_url' => 'documents/begis_portfolio.zip',
            'uploaded_at' => now()->subDay(),
        ]);
    }
}
