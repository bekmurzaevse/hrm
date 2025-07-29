<?php

namespace Tests\Feature;

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CourseTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Summary of test_course_can_get_all
     * @return void
     */
    public function test_course_can_get_all(): void
    {
        $response = $this->getJson('api/v1/courses');

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
     * Summary of test_course_can_show
     * @return void
     */
    public function test_course_can_show(): void
    {
        $course = Course::inRandomOrder()->first();

        $response = $this->getJson("/api/v1/courses/{$course->id}");

        $response
            ->assertOk()
            ->assertJsonStructure([
                'status',
                'message',
                'data'
            ]);
    }

    /**
     * Summary of test_course_can_get_by_slug
     * @return void
     */
    public function test_course_can_create(): void
    {
        //$user = User::find(1)->first();

        //$this->actingAs($user);

        $data = [
            'title' => 'Test Course',
            'description' => 'This is a test course.',
            'created_by' => 1,
        ];

        $response = $this->postJson('/api/v1/courses/create', $data);

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Course created',
            ]);

        $this->assertDatabaseHas('courses', [
            'title' => 'Test Course',
            'description' => 'This is a test course.',
            'created_by' => 1,
        ]);

    }

    /**
     * Summary of test_course_can_update
     * @return void
     */
    public function test_course_can_update()
    {
        // $user = User::find(1)->first();
        // $this->actingAs($user);

        $course = Course::inRandomOrder()->first();

        $updatedData = [
            'title' => 'Updated Course Title',
            'description' => 'Updated description of the course',
            'created_by' => 1,
        ];

        $response = $this->putJson("/api/v1/courses/update/{$course->id}", $updatedData);

        $response
            ->assertStatus(200)
            ->assertJson([
                'message' => "{$course->id} - id li course janalandi",
            ]);
    }

    /**
     * Summary of test_course_can_deletes
     * @return void
     */
    public function test_course_can_deletes()
    {
        //$user = User::find(1)->first();
        //$this->actingAs($user);

        $course = Course::inRandomOrder()->first();

        $response = $this->deleteJson("/api/v1/courses/delete/{$course->id}");

        $response
            ->assertStatus(200)
            ->assertJson([
                'message' => "{$course->id} - id li Course O'shirildi",
            ]);
    }
}