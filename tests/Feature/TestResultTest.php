<?php

namespace Tests\Feature;

use App\Models\Test;
use App\Models\TestResult;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TestResultTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Summary of test_test_result_can_get_all
     * @return void
     */
    public function test_test_result_can_get_all()
    {
        $response = $this->getJson("/api/v1/test-results");

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
     * Summary of test_test_result_can_show
     * @return void
     */
    public function test_test_result_can_show()
    {
        $testResultId = TestResult::inRandomOrder()->first()->id;

        $response = $this->getJson("/api/v1/test-results/" . $testResultId);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data'
            ]);
    }

    /**
     * Summary of test_test_result_can_get_by_user
     * @return void
     */
    public function test_test_result_can_created(): void
    {
        $test = Test::inRandomOrder()->first();
        $user = User::inRandomOrder()->first();

        $data = [
            'test_id' => $test->id,
            'user_id' => $user->id,
            'score' => 85,
        ];

        $response = $this->postJson('/api/v1/test-results/create', $data);

        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => 200,
                'message' => 'Test Result jaratildi',
            ]);

        $this->assertDatabaseHas('test_results', [
            'test_id' => $test->id,
            'user_id' => $user->id,
            'score' => 85,
        ]);
    }

    /**
     * Summary of test_test_result_can_get_by_user
     * @return void
     */
    public function test_test_result_can_updated(): void
    {
        
        $oldResult = TestResult::inRandomOrder()->first();

        $newTest = Test::inRandomOrder()->first();
        $newUser = User::inRandomOrder()->first();

        $updateData = [
            'test_id' => $newTest->id,
            'user_id' => $newUser->id,
            'score' => 95,
        ];

        $response = $this->putJson("/api/v1/test-results/update/{$oldResult->id}", $updateData);

        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => 200,
                'message' => "{$oldResult->id} - id li test result jan'alandi",
            ]);

        $this->assertDatabaseHas('test_results', [
            'id' => $oldResult->id,
            'test_id' => $newTest->id,
            'user_id' => $newUser->id,
            'score' => 95,
        ]);
    }

    /**
     * Summary of test_test_result_can_deleted
     * @return void
     */
    public function test_test_result_can_deleted(): void
    {
        $testResult = TestResult::inRandomOrder()->first();

        $response = $this->deleteJson("/api/v1/test-results/delete/{$testResult->id}");

        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => 200,
                'message' => "{$testResult->id} - id li Test Result o'shirildi",
            ]);

        $this->assertSoftDeleted('test_results', [
            'id' => $testResult->id,
        ]);
    }

}