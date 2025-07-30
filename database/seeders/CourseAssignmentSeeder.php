<?php

namespace Database\Seeders;

use App\Models\CourseAssignment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseAssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $assaignment1 = CourseAssignment::create([
            'course_id' => 1, 
            'user_id' => 1,   
            'assigned_at' => now(),
            'completed_at' => null,
            'certificate_url' => null,
        ]);

        $assaignment1->certificate()->create([
            'name' => 'certificate_user1_course1.pdf',
            'path' => 'certificates/user1-course1.pdf',
            'type' => 'course_certificate',
            'size' => 2048, // Example size in bytes
        ]);

        CourseAssignment::create([
            'course_id' => 1,
            'user_id' => 2,
            'assigned_at' => now()->subDays(5),
            'completed_at' => now(),
            'certificate_url' => 'certificates/user2-course1.pdf',
        ]);

        CourseAssignment::create([
            'course_id' => 2,
            'user_id' => 1,
            'assigned_at' => now()->subDays(3),
            'completed_at' => null,
            'certificate_url' => null,
        ]);
    }
}
