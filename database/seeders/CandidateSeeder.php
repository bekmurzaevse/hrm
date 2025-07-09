<?php

namespace Database\Seeders;

use App\Models\Candidate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        Candidate::create([
            'first_name' => 'Aybek',
            'last_name' => 'Jalalov',
            'email' => 'aybek.jalalov@example.com',
            'phone' => '+998901234567',
            'education' => 'TATU, Kompyuter injiniringi (2020)',
            'experience' => '2 jil - Web developer (Laravel)',
            'photo_url' => 'photos/aybek.jpg',
            'status' => 'pending',
        ]);

        Candidate::create([
            'first_name' => 'Zina',
            'last_name' => 'Qoblanova',
            'email' => 'zina.qoblanova@example.com',
            'phone' => '+998933214567',
            'education' => 'QMU, Matematika (2024)',
            'experience' => '1 yil - Data analyst',
            'photo_url' => 'photos/zina.jpg',
            'status' => 'interviewed',
        ]);

        Candidate::create([
            'first_name' => 'Begis',
            'last_name' => 'Damirov',
            'email' => 'begis.damirov@example.com',
            'phone' => '+998935556677',
            'education' => 'WIUT, IT Management (2021)',
            'experience' => '1.5 yil - Backend Developer',
            'photo_url' => null,
            'status' => 'hired',
        ]);
    }
}
