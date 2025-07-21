<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Summary of test_project_can_get_all
     * @return void
     */
    public function test_project_can_get_all(): void
    {
        $response = $this->getJson("/api/v1/projects");

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
                            'status',
                            'budget',
                            'created_by',
                            'deadline',
                            'created_at',
                            'updated_at',
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
     * Summary of test_project_can_show
     * @return void
     */
    public function test_project_can_show(): void
    {
        // $user = User::find(1)->first();
        // $this->actingAs($user);

        $projectId = Project::inRandomOrder()->first()->id;

        $response = $this->getJson('/api/v1/projects/' . $projectId);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'title',
                    'status',
                    'budget',
                    'created_by',
                    'deadline',
                    'created_at',
                    'updated_at',
                ]
            ]);
    }

    /**
     * Summary of test_project_can_create
     * @return void
     */
    public function test_project_can_create(): void
    {
        // $user = User::find(1)->first();
        // $this->actingAs($user);

        $title = "5 chef";
        $budget = 3000;
        $deadline = now()->addMonth();
        $createdBy = User::inRandomOrder()->first()->id;

        $data = [
            'title' => $title,
            'budget' => $budget,
            'deadline' => $deadline,
            'created_by' => $createdBy,
        ];

        $response = $this->postJson('/api/v1/projects/create', $data);

        $response->assertStatus(200)->assertExactJson([
            'status' => 200,
            'message' => 'Project created',
        ]);

        $this->assertDatabaseHas('projects', [
            'title' => $title,
            'budget' => $budget,
            'created_by' => $createdBy,
        ]);
    }

    /**
     * Summary of test_project_can_update
     * @return void
     */
    public function test_project_can_update(): void
    {
        // $user = User::find(1)->first();
        // $this->actingAs($user);

        $project = Project::inRandomOrder()->first();

        $title = "3 chef";
        $budget = 2600;
        $deadline = now()->addMonth();
        $createdBy = User::inRandomOrder()->first()->id;

        $data = [
            'title' => $title,
            'budget' => $budget,
            'deadline' => $deadline,
            'created_by' => $createdBy,
        ];

        $response = $this->putJson('/api/v1/projects/update/' . $project->id, $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'title',
                    'status',
                    'budget',
                    'created_by',
                    'deadline',
                    'created_at',
                    'updated_at',
                ]
            ]);

        $this->assertDatabaseHas('projects', [
            'title' => $title,
            'budget' => $budget,
            'created_by' => $createdBy,
        ]);
    }

    /**
     * Summary of test_project_can_delete
     * @return void
     */
    public function test_project_can_delete(): void
    {
        // $user = User::find(1)->first();
        // $this->actingAs($user);

        $projectId = Project::inRandomOrder()->first()->id;

        $response = $this->deleteJson('/api/v1/projects/delete/' . $projectId);

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'status' => 200,
                'message' => 'Project Deleted',
            ]);

        $this->assertSoftDeleted('projects', [
            'id' => $projectId,
        ]);
    }
}
