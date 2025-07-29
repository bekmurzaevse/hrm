<?php

namespace Tests\Feature;

use App\Models\CourseAssignment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CourseAssignmentTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Summary of test_course_assignment_can_get_all
     * @return void
     */
    public function test_course_assignment_can_get_all(): void
    {
        $response = $this->getJson("/api/v1/course-assignments/");

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'items',
                    'pagination' => [
                        'current_page',
                        'per_page',
                        'last_page',
                        'total',
                    ]
                ]
            ]);
    }

    /**
     * Summary of test_course_assignment_can_show
     * @return void
     */
    // public function test_course_assignment_can_show(): void
    // {
    //     $assignment = CourseAssignment::inRandomOrder()->first();

    //     $response = $this->getJson("/api/v1/courses-assignments/{$assignment->id}");

    //     $response
    //         ->assertStatus(200)
    //         ->assertJsonStructure([
    //             'status',
    //             'message',
    //             'data' => [
    //                 'id',
    //                 'course_id',
    //                 'user_id',
    //                 'assigned_at',
    //                 'completed_at',
    //                 'certifikat_url',
    //                 'created_at',
    //                 'updated_at'
    //             ],
    //         ]);
    // }
}