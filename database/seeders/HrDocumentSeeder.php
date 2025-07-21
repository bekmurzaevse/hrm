<?php

namespace Database\Seeders;

use App\Helpers\FileUploadHelper;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;

class HrDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = UploadedFile::fake()->create('passport.pdf', 1024, 'application/pdf');

        $path = FileUploadHelper::file($file, 'hr_documents');

        $user = User::first();

        $user->hrDocuments()->create([
            'name' => $file->getClientOriginalName(),
            'path' => $path,
            'type' => 'hr_document',
            'size' => $file->getSize(),
            'description' => $dto->description ?? null,
        ]);
    }
}
