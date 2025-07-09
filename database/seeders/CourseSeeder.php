<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([
            'title' => 'Laravel beginners',
            'description' => 'Laravel framework tiykarlari ham route, controller, view tuwrali.',
            'created_by' => 1,
        ]);

        Course::create([
            'title' => 'PHP OOP',
            'description' => 'Object-Oriented Programming PHP da qalay isleydi.',
            'created_by' => 1,
        ]);

        Course::create([
            'title' => 'Docker ham Laravel integratsiyasi',
            'description' => 'Docker containerlerde Laraveldi qollaniw.',
            'created_by' => 1,
        ]);
    }
}
