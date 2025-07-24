<?php

namespace Tests\Feature;

use App\Models\KpiRecord;
use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class KpiRecordTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Summary of test_kpi_record_can_get_all
     * @return void
     */
    public function test_kpi_record_can_get_all(): void
    {
        $response = $this->getJson('/api/v1/kpi-records');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'items' => [
                        [
                            'id',
                            'user',
                            'vacancy',
                            'kpi_score',
                            'calculated_at',
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
     * Summary of test_kpi_record_can_show
     * @return void
     */
    public function test_kpi_record_can_show(): void
    {
        $kpiRecordId = KpiRecord::inRandomOrder()->first()->id;

        $response = $this->getJson('/api/v1/kpi-records/' . $kpiRecordId);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'user',
                    'vacancy',
                    'kpi_score',
                    'calculated_at',
                    'created_at',
                    'updated_at'
                ]
            ]);

        $this->assertEquals($kpiRecordId, $response['data']['id']);
    }

    /**
     * Summary of test_kpi_record_can_create
     * @return void
     */
    public function test_kpi_record_can_create(): void
    {
        $userId = User::inRandomOrder()->first()->id;
        $vacancyId = Vacancy::inRandomOrder()->first()->id;
        $kpiScore = '80.5';
        $calculatedAt = '2025-07-23 10:00';

        $data = [
            'user_id' => $userId,
            'vacancy_id' => $vacancyId,
            'kpi_score' => $kpiScore,
            'calculated_at' => $calculatedAt
        ];

        $response = $this->postJson('/api/v1/kpi-records/create', $data);

        $response->assertStatus(200)->assertExactJson([
            'status' => 200,
            'message' => 'Kpi Record created',
        ]);

        $data['calculated_at'] = '2025-07-23 10:00:00';

        $this->assertDatabaseHas('kpi_records', $data);
    }

    /**
     * Summary of test_kpi_record_can_update
     * @return void
     */
    public function test_kpi_record_can_update(): void
    {
        $kpiRecord = KpiRecord::inRandomOrder()->first();

        $userId = User::inRandomOrder()->first()->id;
        $vacancyId = Vacancy::inRandomOrder()->first()->id;
        $kpiScore = '89.5';
        $calculatedAt = '2025-06-25 12:00';

        $data = [
            'user_id' => $userId,
            'vacancy_id' => $vacancyId,
            'kpi_score' => $kpiScore,
            'calculated_at' => $calculatedAt
        ];

        $response = $this->putJson('/api/v1/kpi-records/update/' . $kpiRecord->id, $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'user',
                    'vacancy',
                    'kpi_score',
                    'calculated_at',
                    'created_at',
                    'updated_at'
                ]
            ]);

        $data['id'] = $kpiRecord->id;
        $data['calculated_at'] = '2025-06-25 12:00:00';
        $this->assertDatabaseHas('kpi_records', $data);
    }

    /**
     * Summary of test_kpi_record_can_delete
     * @return void
     */
    public function test_kpi_record_can_delete(): void
    {
        $kpiRecordId = KpiRecord::inRandomOrder()->first()->id;

        $response = $this->deleteJson('/api/v1/kpi-records/delete/' . $kpiRecordId);

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'status' => 200,
                'message' => 'Kpi Record Deleted',
            ]);

        $this->assertSoftDeleted('kpi_records', [
            'id' => $kpiRecordId,
        ]);
    }
}
