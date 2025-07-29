<?php

namespace Tests\Feature;

use App\Models\Course;
use App\Models\CourseMaterial;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class CourseMaterialTest extends TestCase
{
    
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Summary of test_course_material_can_get_all
     * @return void
     */
    public function test_course_material_can_get_all(): void
    {
        $courseID = Course::has('materials')->inRandomOrder()->first()->id;

        $response = $this->getJson("/api/v1/course-materials?course_id={$courseID}");

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
     * Summary of test_course_material_can_show
     * @return void
     */
    public function test_course_material_can_show(): void
    {
        $course = Course::has('materials')->inRandomOrder()->first();
        $material = $course->materials()->inRandomOrder()->first();

        $response = $this->getJson("/api/v1/course-materials/{$material->id}?course_id={$course->id}");

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'name',
                    'path',
                    'type',
                    'size',
                    'description',
                    'created_at',
                    'download_url',
                ]
            ]);
    }

    /**
     * Summary of test_course_material_can_create
     * @return void
     */
    public function test_course_material_can_create(): void
    {
        $courseID = Course::first()->id;

        $file = UploadedFile::fake()->create('material.pdf', 1024, 'application/pdf');

        $data = [
            'course_id' => $courseID,
            'file' => $file,
            'name' => 'Test material',
            'description' => 'Test description',
        ];

        $response = $this->postJson('/api/v1/course-materials/create', $data);

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'status' => 200,
                'message' => 'Course Material Created',
            ]);
    }

    /**
     * Summary of test_course_material_can_update
     * @return void
     */
    public function test_course_material_can_update(): void
    {
        $course = Course::has('materials')->inRandomOrder()->firstOrFail();

        $material = $course->materials()->inRandomOrder()->first();

        $this->assertNotNull($material, 'Course does not have any materials');
        $materialId = $material->id;

        $file = UploadedFile::fake()->create('update.pdf', 1024, 'application/pdf');

        $data = [
            'course_id' => $course->id,
            'file' => $file,
            'description' => 'description',
        ];

        $response = $this->putJson("/api/v1/course-materials/update/{$materialId}", $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);

        $this->assertDatabaseHas('files', [
            'id' => $materialId,
            'description' => 'description',
        ]);
    }

    /**
     * Summary of test_course_material_can_delete
     * @return void
     */
    public function test_course_material_can_delete(): void
    {
        $course = Course::has('materials')->firstOrFail();
        $material = $course->materials()->inRandomOrder()->first();

        $this->assertNotNull($material, 'Course does not have any materials');
        $materialId = $material->id;

        $response = $this->deleteJson("/api/v1/course-materials/delete/{$materialId}?course_id={$course->id}");

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'status' => 200,
                'message' => "{$materialId} - id li Course Material o'shirildi",
            ]);

        $this->assertSoftDeleted('files', [
            'id' => $materialId,
        ]);
    }
}

