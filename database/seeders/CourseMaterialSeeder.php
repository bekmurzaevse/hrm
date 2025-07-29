<?php

namespace Database\Seeders;

use App\Helpers\FileUploadHelper;
use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;

class CourseMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = UploadedFile::fake()->create('material.pdf', 1024, 'application/pdf');

        $path = FileUploadHelper::file($file, 'course_material');

        $course = Course::first();

        $course->materials()->create([
            'name' => $file->getClientOriginalName(),
            'path' => $path,
            'type' => 'course_material',
            'size' => $file->getSize(),
            'description' => $dto->description ?? null,
        ]);
    }
}
