<?php

namespace Tests\Feature;

use App\Models\Application;
use App\Models\Candidate;
use App\Models\RecruitmentFunnelStage;
use App\Models\Vacancy;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApplicationTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Summary of test_application_can_get_all
     * @return void
     */
    public function test_application_can_get_all(): void
    {
        $response = $this->getJson('/api/v1/applications');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'items' => [
                        [
                            'id',
                            'candidate',
                            'vacancy',
                            'current_stage',
                            'applied_at',
                            'created_at',
                            'updated_at'
                        ]
                    ],
                    'pagination' => [
                        'current_page',
                        'per_page',
                        'last_page',
                        'total'
                    ]
                ]
            ]);
    }

    /**
     * Summary of test_application_can_show
     * @return void
     */
    public function test_application_can_show(): void
    {
        $applicationId = Application::inRandomOrder()->first()->id;

        $response = $this->getJson('/api/v1/applications/' . $applicationId);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'candidate',
                    'vacancy',
                    'current_stage',
                    'applied_at',
                    'created_at',
                    'updated_at'
                ]
            ]);

        $this->assertEquals($applicationId, $response['data']['id']);
    }

    /**
     * Summary of test_application_can_create
     * @return void
     */
    public function test_application_can_create(): void
    {
        $candidateId = Candidate::inRandomOrder()->first()->id;
        $vacancyId = Vacancy::inRandomOrder()->first()->id;
        $currentStage = RecruitmentFunnelStage::inRandomOrder()->first()->id;
        $appliedAt = '2025-07-23 00:00:00';

        $data = [
            'candidate_id' => $candidateId,
            'vacancy_id' => $vacancyId,
            'current_stage' => $currentStage,
            'applied_at' => $appliedAt
        ];

        $response = $this->postJson('/api/v1/applications/create', $data);

        $response->assertStatus(200)->assertExactJson([
            'status' => 200,
            'message' => 'Application created',
        ]);

        $this->assertDatabaseHas('applications', $data);
    }

    /**
     * Summary of test_application_can_update
     * @return void
     */
    public function test_application_can_update(): void
    {
        $application = application::inRandomOrder()->first();

        $candidateId = Candidate::inRandomOrder()->first()->id;
        $vacancyId = Vacancy::inRandomOrder()->first()->id;
        $currentStage = RecruitmentFunnelStage::inRandomOrder()->first()->id;
        $appliedAt = '2025-07-22 00:00:00';

        $data = [
            'candidate_id' => $candidateId,
            'vacancy_id' => $vacancyId,
            'current_stage' => $currentStage,
            'applied_at' => $appliedAt
        ];

        $response = $this->putJson('/api/v1/applications/update/' . $application->id, $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'candidate',
                    'vacancy',
                    'current_stage',
                    'applied_at',
                    'created_at',
                    'updated_at'
                ]
            ]);

        $data['id'] = $application->id;

        $this->assertDatabaseHas('applications', $data);
    }

    /**
     * Summary of test_application_can_delete
     * @return void
     */
    public function test_application_can_delete(): void
    {
        $applicationId = application::inRandomOrder()->first()->id;

        $response = $this->deleteJson('/api/v1/applications/delete/' . $applicationId);

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'status' => 200,
                'message' => 'Application Deleted',
            ]);

        $this->assertSoftDeleted('applications', [
            'id' => $applicationId,
        ]);
    }
}
