<?php

namespace Database\Seeders;

use App\Helpers\FileUploadHelper;
use App\Models\Candidate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $candidate1 = Candidate::create([
            'first_name' => 'Aybek',
            'last_name' => 'Jalalov',
            'email' => 'aybek.jalalov@example.com',
            'phone' => '+998901234567',
            'education' => 'TATU, Kompyuter injiniringi (2020)',
            'experience' => '2 jil - Web developer (Laravel)',
            'status' => 'pending',
        ]);

        $photo = UploadedFile::fake()->image('aybek.jpg');
        $path = FileUploadHelper::file($photo, 'candidate_photo');

        $candidate1->photo()->create([
            'name' => $photo->getClientOriginalName(),
            'path' => $path,
            'type' => "candidate_photo",
            'size' => $photo->getSize(),
        ]);

        $candidate2 = Candidate::create([
            'first_name' => 'Zina',
            'last_name' => 'Qoblanova',
            'email' => 'zina.qoblanova@example.com',
            'phone' => '+998933214567',
            'education' => 'QMU, Matematika (2024)',
            'experience' => '1 yil - Data analyst',
            'status' => 'interviewed',
        ]);

        $photo = UploadedFile::fake()->image('zina.jpg');
        $path = FileUploadHelper::file($photo, 'candidate_photo');

        $candidate2->photo()->create([
            'name' => $photo->getClientOriginalName(),
            'path' => $path,
            'type' => "candidate_photo",
            'size' => $photo->getSize(),
        ]);

        $candidate3 = Candidate::create([
            'first_name' => 'Begis',
            'last_name' => 'Damirov',
            'email' => 'begis.damirov@example.com',
            'phone' => '+998935556677',
            'education' => 'WIUT, IT Management (2021)',
            'experience' => '1.5 jil - Backend Developer',
            'status' => 'hired',
        ]);

        $photo = UploadedFile::fake()->image('begis.jpg');
        $path = FileUploadHelper::file($photo, 'candidate_photo');

        $candidate3->photo()->create([
            'name' => $photo->getClientOriginalName(),
            'path' => $path,
            'type' => "candidate_photo",
            'size' => $photo->getSize(),
        ]);
    }
}
