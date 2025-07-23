<?php

namespace Tests\Feature;

use App\Models\Application;
use App\Models\FunnelLog;
use App\Models\RecruitmentFunnelStage;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FunnelLogTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Summary of test_funnel_log_can_get_all
     * @return void
     */
    public function test_funnel_log_can_get_all(): void
    {
        $response = $this->getJson('/api/v1/funnel-logs');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'items' => [
                        [
                            'id',
                            'application',
                            'stage',
                            'moved_by',
                            'moved_at',
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
     * Summary of test_funnel_log_can_show
     * @return void
     */
    public function test_funnel_log_can_show(): void
    {
        $funnelLogId = FunnelLog::inRandomOrder()->first()->id;

        $response = $this->getJson('/api/v1/funnel-logs/' . $funnelLogId);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'application',
                    'stage',
                    'moved_by',
                    'moved_at',
                    'created_at',
                    'updated_at'
                ]
            ]);

        $this->assertEquals($funnelLogId, $response['data']['id']);
    }

    /**
     * Summary of test_funnel_log_can_create
     * @return void
     */
    public function test_funnel_log_can_create(): void
    {
        $applicationId = Application::inRandomOrder()->first()->id;
        $stageId = RecruitmentFunnelStage::inRandomOrder()->first()->id;
        $movedBy = User::inRandomOrder()->first()->id;
        $movedAt = now();

        $data = [
            'application_id' => $applicationId,
            'stage_id' => $stageId,
            'moved_by' => $movedBy,
            'moved_at' => $movedAt
        ];

        $response = $this->postJson('/api/v1/funnel-logs/create', $data);

        $response->assertStatus(200)->assertExactJson([
            'status' => 200,
            'message' => 'Funnel Log created',
        ]);

        $this->assertDatabaseHas('funnel_logs', $data);
    }

    /**
     * Summary of test_funnel_log_can_update
     * @return void
     */
    public function test_funnel_log_can_update(): void
    {
        $funnelLog = FunnelLog::inRandomOrder()->first();

        $applicationId = Application::inRandomOrder()->first()->id;
        $stageId = RecruitmentFunnelStage::inRandomOrder()->first()->id;
        $movedBy = User::inRandomOrder()->first()->id;
        $movedAt = now();

        $data = [
            'application_id' => $applicationId,
            'stage_id' => $stageId,
            'moved_by' => $movedBy,
            'moved_at' => $movedAt
        ];

        $response = $this->putJson('/api/v1/funnel-logs/update/' . $funnelLog->id, $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'application',
                    'stage',
                    'moved_by',
                    'moved_at',
                    'created_at',
                    'updated_at'
                ]
            ]);

        $data['id'] = $funnelLog->id;

        $this->assertDatabaseHas('funnel_logs', $data);
    }

    /**
     * Summary of test_funnel_log_can_delete
     * @return void
     */
    public function test_funnel_log_can_delete(): void
    {
        $funnelLogId = FunnelLog::inRandomOrder()->first()->id;

        $response = $this->deleteJson('/api/v1/funnel-logs/delete/' . $funnelLogId);

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'status' => 200,
                'message' => 'Funnel Log Deleted',
            ]);

        $this->assertSoftDeleted('funnel_logs', [
            'id' => $funnelLogId,
        ]);
    }
}
