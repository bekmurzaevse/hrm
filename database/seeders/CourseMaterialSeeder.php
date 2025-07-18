<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseMaterial;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CourseMaterialSeeder extends Seeder
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
        $path = Storage::disk('public')->putFileAs('materials', $file, $fileName);
        
        CourseMaterial::create([
            'type' => 'course_material',
            'file_url' => $path,
            'course_id' => Course::inRandomOrder()->first()->id,
        ]);
    }
}
