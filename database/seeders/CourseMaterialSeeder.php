<?php

namespace Database\Seeders;

use App\Models\CourseMaterial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CourseMaterial::create([
            'course_id' => 1,
            'file_url' => 'materials/laravel-intro.pdf',
            'type' => 'pdf',
            'uploaded_at' => now(),
        ]);

        CourseMaterial::create([
            'course_id' => 1,
            'file_url' => 'materials/lesson1-video.mp4',
            'type' => 'video',
            'uploaded_at' => now()->subDays(2),
        ]);

        CourseMaterial::create([
            'course_id' => 2,
            'file_url' => 'materials/docker-guide.docx',
            'type' => 'docx',
            'uploaded_at' => now()->subDays(5),
        ]);
    }
}
