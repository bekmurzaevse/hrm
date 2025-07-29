<?php

namespace Database\Seeders;

use App\Helpers\FileUploadHelper;
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
        $file = UploadedFile::fake()->create('document.pdf', 1024, 'application/pdf');

        $path = FileUploadHelper::file($file, 'candidate_document');

        $candidate = Candidate::first();

        $candidate->documents()->create([
            'name' => $file->getClientOriginalName(),
            'path' => $path,
            'type' => 'candidate_document',
            'size' => $file->getSize(),
            'description' => $dto->description ?? null,
        ]);
    }
}
