<?php

namespace Tests\Feature;

use App\Models\RecruitmentFunnelStage;
use App\Models\Vacancy;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RecruitmentFunnelStageTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }


    /**
     * Summary of test_recruitment_funnel_stage_can_get_all
     * @return void
     */
    public function test_recruitment_funnel_stage_can_get_all(): void
    {
        $response = $this->getJson('/api/v1/recruitment-funnel-stages');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'items' => [
                        [
                            'id',
                            'vacancy',
                            'stage_name',
                            'order',
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
     * Summary of test_recruitment_funnel_stage_can_show
     * @return void
     */
    public function test_recruitment_funnel_stage_can_show(): void
    {

        $id = RecruitmentFunnelStage::inRandomOrder()->first()->id;

        $response = $this->getJson('/api/v1/recruitment-funnel-stages/' . $id);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'vacancy',
                    'stage_name',
                    'order',
                    'created_at',
                    'updated_at'
                ]
            ]);


        $this->assertEquals($id, $response['data']['id']);
    }

    /**
     * Summary of test_recruitment_funnel_stage_can_create
     * @return void
     */
    public function test_recruitment_funnel_stage_can_create(): void
    {
        $vacancyId = Vacancy::inRandomOrder()->first()->id;
        $stageName = 'Application Received';
        $order = 1;

        $data = [
            'vacancy_id' => $vacancyId,
            'stage_name' => $stageName,
            'order' => $order,
        ];

        $response = $this->postJson('/api/v1/recruitment-funnel-stages/create', $data);

        $response->assertStatus(200)->assertExactJson([
            'status' => 200,
            'message' => 'Recruitment Funnel Stage created',
        ]);

        $this->assertDatabaseHas('recruitment_funnel_stages', $data);
    }

    /**
     * Summary of test_recruitment_funnel_stage_can_update
     * @return void
     */
    public function test_recruitment_funnel_stage_can_update(): void
    {
        $stage = RecruitmentFunnelStage::inRandomOrder()->first();

        $vacancyId = Vacancy::inRandomOrder()->first()->id;
        $stageName = 'Screening';
        $order = 1;

        $data = [
            'vacancy_id' => $vacancyId,
            'stage_name' => $stageName,
            'order' => $order
        ];

        $response = $this->putJson('/api/v1/recruitment-funnel-stages/update/' . $stage->id, $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'vacancy',
                    'stage_name',
                    'order',
                    'created_at',
                    'updated_at'
                ]
            ]);

        $data['id'] = $stage->id;

        $this->assertDatabaseHas('recruitment_funnel_stages', $data);
    }

    /**
     * Summary of test_recruitment_funnel_stage_can_delete
     * @return void
     */
    public function test_recruitment_funnel_stage_can_delete(): void
    {
        $stageId = RecruitmentFunnelStage::inRandomOrder()->first()->id;

        $response = $this->deleteJson('/api/v1/recruitment-funnel-stages/delete/' . $stageId);

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'status' => 200,
                'message' => 'Recruitment Funnel Stage Deleted',
            ]);

        $this->assertSoftDeleted('recruitment_funnel_stages', [
            'id' => $stageId,
        ]);
    }
}
