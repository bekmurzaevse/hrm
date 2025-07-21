<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VacancyTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Summary of test_vacancy_can_get_all
     * @return void
     */
    public function test_vacancy_can_get_all(): void
    {
        $response = $this->getJson("/api/v1/vacancies");

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
                            'requirements',
                            'salary',
                            'deadline',
                            'status',
                            'recruiter',
                            'project',
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
     * Summary of test_vacancy_can_show
     * @return void
     */
    public function test_vacancy_can_show(): void
    {
        // $user = User::find(1)->first();
        // $this->actingAs($user);

        $vacancyId = Vacancy::inRandomOrder()->first()->id;

        $response = $this->getJson('/api/v1/vacancies/' . $vacancyId);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'title',
                    'requirements',
                    'salary',
                    'deadline',
                    'status',
                    'recruiter',
                    'project',
                    'created_at',
                    'updated_at',
                ]
            ]);
    }

    /**
     * Summary of test_vacancy_can_create
     * @return void
     */
    public function test_vacancy_can_create(): void
    {
        // $user = User::find(1)->first();
        // $this->actingAs($user);

        $title = "Devops";
        $requirements = "junior";
        $description = "description";
        $salary = 2000;
        $deadline = now()->addMonth();
        $recruiter_id = User::inRandomOrder()->first()->id;
        $project_id = Project::inRandomOrder()->first()->id;

        $data = [
            'title' => $title,
            'requirements' => $requirements,
            'salary' => $salary,
            'deadline' => $deadline,
            'recruiter_id' => $recruiter_id,
            'project_id' => $project_id,
            'description' => $description,
        ];

        $response = $this->postJson('/api/v1/vacancies/create', $data);

        $response->assertStatus(200)->assertExactJson([
            'status' => 200,
            'message' => 'Vacancy created',
        ]);

        $this->assertDatabaseHas('vacancies', [
            'title' => $title,
            'requirements' => $requirements,
            'salary' => $salary,
            'recruiter_id' => $recruiter_id,
            'project_id' => $project_id,
            'description' => $description,
        ]);
    }


    /**
     * Summary of test_vacancy_can_update
     * @return void
     */
    public function test_vacancy_can_update(): void
    {
        // $user = User::find(1)->first();
        // $this->actingAs($user);

        $vacancy = Vacancy::inRandomOrder()->first();

        $title = "Devops new";
        $requirements = "senior";
        $description = "description new";
        $salary = 3500;
        $deadline = now()->addMonth();
        $recruiter_id = User::inRandomOrder()->first()->id;
        $project_id = Project::inRandomOrder()->first()->id;

        $data = [
            'title' => $title,
            'requirements' => $requirements,
            'salary' => $salary,
            'deadline' => $deadline,
            'recruiter_id' => $recruiter_id,
            'project_id' => $project_id,
            'description' => $description,
        ];

        $response = $this->putJson('/api/v1/vacancies/update/' . $vacancy->id, $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'title',
                    'requirements',
                    'salary',
                    'deadline',
                    'status',
                    'recruiter',
                    'project',
                    'created_at',
                    'updated_at',
                ]
            ]);

        $this->assertDatabaseHas('vacancies', [
            'title' => $title,
            'requirements' => $requirements,
            'salary' => $salary,
            'recruiter_id' => $recruiter_id,
            'project_id' => $project_id,
            'description' => $description,
        ]);
    }


    /**
     * Summary of test_vacancy_can_delete
     * @return void
     */
    public function test_vacancy_can_delete(): void
    {
        // $user = User::find(1)->first();
        // $this->actingAs($user);

        $vacancyId = Vacancy::inRandomOrder()->first()->id;

        $response = $this->deleteJson('/api/v1/vacancies/delete/' . $vacancyId);

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'status' => 200,
                'message' => 'Vacancy Deleted',
            ]);

        $this->assertSoftDeleted('vacancies', [
            'id' => $vacancyId,
        ]);
    }
}
