<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\CandidateDocument;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CandidateDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = UploadedFile::fake()->create('passport.pdf', 1024, 'application/pdf');
        $originalFilename = $file->getClientOriginalName();
        $fileName = pathinfo($originalFilename, PATHINFO_FILENAME);
        $fileName = $fileName . '_' . Str::random(10) . '_' . now()->format('Y-m-d-H:i:s') . '.' . $file->extension();
        $path = Storage::disk('public')->putFileAs('documents', $file, $fileName);
        
        CandidateDocument::create([
            'type' => 'candidate_document',
            'file_url' => $path,
            'candidate_id' => Candidate::inRandomOrder()->first()->id,
        ]);
    }
}
