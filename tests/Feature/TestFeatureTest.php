<?php

namespace Tests\Feature;

use App\Models\Test;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TestFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_tests_can_get_all()
    {
        $response = $this->getJson("/api/v1/tests");

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

    public function test_tests_can_show()
    {
        $testId = Test::inRandomOrder()->first()->id;

        $response = $this->getJson("/api/v1/tests/" . $testId);

        $response
        ->assertStatus(200)
        ->assertJsonStructure([
            'status',
            'message',
            'data' => [
                'id',
                'title',
                'course',
                'created_at',
                'updated_at'
            ]
        ]);
    }

    public function test_tests_can_create()
    {
        $data = [
            'title' => 'Test Title',
            'course_id' => 1,
        ];

        $response = $this->postJson("/api/v1/tests/create", $data);

        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => 200,
                'message' => 'Test jaratildi.',
            ]);
    }

    public function test_tests_can_update()
    {
        $testId = Test::inRandomOrder()->first()->id;
        $data = [
            'title' => 'Updated Test Title',
            'course_id' => 1,
        ];

        $response = $this->putJson("/api/v1/tests/update/" . $testId, $data);

        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => 200,
                'message' => "$testId - id li test jan'alandi",
            ]);
    }

    public function test_tests_can_delete()
    {
        $testId = Test::inRandomOrder()->first()->id;

        $response = $this->deleteJson("/api/v1/tests/delete/" . $testId);

        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => 200,
                'message' => "$testId - id li Test o'shirildi",
            ]);
    }
}