<?php

namespace Tests\Feature;

use App\Models\Report;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ReportTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Summary of test_report_can_get_all
     * @return void
     */
    public function test_report_can_get_all(): void
    {
        $response = $this->getJson('/api/v1/reports');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'items' => [
                        [
                            'id',
                            'title',
                            'type',
                            'generated_by',
                            'file_download_url',
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
     * Summary of test_report_can_show
     * @return void
     */
    public function test_report_can_show(): void
    {
        $reportId = report::inRandomOrder()->first()->id;

        $response = $this->getJson('/api/v1/reports/' . $reportId);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'title',
                    'type',
                    'generated_by',
                    'file_download_url',
                    'created_at',
                    'updated_at'
                ]
            ]);

        $this->assertEquals($reportId, $response['data']['id']);
    }

    /**
     * Summary of test_report_can_create
     * @return void
     */
    public function test_report_can_create(): void
    {
        $title = 'Vacancy Performance Q2';
        $type = 'vacancy';
        $generatedBy = User::inRandomOrder()->first()->id;
        $file = UploadedFile::fake()->create('test.pdf', 200, 'application/pdf');
        $description = 'A quarterly analytical report summarizing the performance of all active and closed vacancies during the second quarter (April to June). It includes metrics such as the number of applications received, interview-to-hire conversion rate, time-to-hire, and recruiter efficiency.';

        $data = [
            'title' => $title,
            'type' => $type,
            'generated_by' => $generatedBy,
            'file' => $file,
            'description' => $description
        ];

        $response = $this->postJson('/api/v1/reports/create', $data);

        $response->assertStatus(200)->assertExactJson([
            'status' => 200,
            'message' => 'Report created',
        ]);

        $this->assertDatabaseHas('reports', [
            'title' => $title,
            'type' => $type,
            'generated_by' => $generatedBy
        ]);

        $report = Report::where('title', $title)
            ->where('type', $type)
            ->where('generated_by', $generatedBy)
            ->first();

        $this->assertDatabaseHas('files', [
            'name' => $file->getClientOriginalName(),
            'type' => $file->getMimeType(),
            'size' => $file->getSize(),
            'fileable_id' => $report->id,
            'fileable_type' => Report::class,
            'description' => $description
        ]);
    }

    /**
     * Summary of test_report_can_update
     * @return void
     */
    public function test_report_can_update(): void
    {
        $report = Report::inRandomOrder()->first();

        $title = 'Vacancy Performance Q2';
        $type = 'vacancy';
        $generatedBy = User::inRandomOrder()->first()->id;
        $file = UploadedFile::fake()->create('test.pdf', 200, 'application/pdf');
        $description = 'A quarterly analytical report summarizing the performance of all active and closed vacancies during the second quarter (April to June). It includes metrics such as the number of applications received, interview-to-hire conversion rate, time-to-hire, and recruiter efficiency.';

        $data = [
            'title' => $title,
            'type' => $type,
            'generated_by' => $generatedBy,
            'file' => $file,
            'description' => $description
        ];

        $response = $this->putJson('/api/v1/reports/update/' . $report->id, $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'title',
                    'type',
                    'generated_by',
                    'file_download_url',
                    'created_at',
                    'updated_at'
                ]
            ]);

        $this->assertDatabaseHas('reports', [
            'id' => $report->id,
            'title' => $title,
            'type' => $type,
            'generated_by' => $generatedBy
        ]);

        $this->assertDatabaseHas('files', [
            'name' => $file->getClientOriginalName(),
            'type' => $file->getMimeType(),
            'size' => $file->getSize(),
            'fileable_id' => $report->id,
            'fileable_type' => Report::class,
            'description' => $description
        ]);
    }

    /**
     * Summary of test_report_can_delete
     * @return void
     */
    public function test_report_can_delete(): void
    {
        $reportId = Report::inRandomOrder()->first()->id;

        $response = $this->deleteJson('/api/v1/reports/delete/' . $reportId);

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'status' => 200,
                'message' => 'Report Deleted',
            ]);

        $this->assertSoftDeleted('reports', [
            'id' => $reportId,
        ]);
    }
}
