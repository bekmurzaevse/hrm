<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Summary of test_task_can_get_all
     * @return void
     */
    public function test_task_can_get_all(): void
    {
        $response = $this->getJson('/api/v1/tasks');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'items' => [
                        [
                            'id',
                            'assigned',
                            'title',
                            'description',
                            'due_date',
                            'status',
                            'created_by',
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
     * Summary of test_task_can_show
     * @return void
     */
    public function test_task_can_show(): void
    {
        $taskId = Task::inRandomOrder()->first()->id;

        $response = $this->getJson('/api/v1/tasks/' . $taskId);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'assigned',
                    'title',
                    'description',
                    'due_date',
                    'status',
                    'created_by',
                    'created_at',
                    'updated_at'
                ]
            ]);

        $this->assertEquals($taskId, $response['data']['id']);
    }

    /**
     * Summary of test_task_can_create
     * @return void
     */
    public function test_task_can_create(): void
    {
        $assignedToId = User::inRandomOrder()->first()->id;
        $title = 'Sample Task Title';
        $description = 'This is a sample task description.';
        $dueDate = '2023-12-31 10:00';
        $status = 'pending';
        $createdById = User::inRandomOrder()->first()->id;

        $data = [
            'assigned_to_id' => $assignedToId,
            'title' => $title,
            'description' => $description,
            'due_date' => $dueDate,
            'status' => $status,
            'created_by_id' => $createdById,
        ];

        $response = $this->postJson('/api/v1/tasks/create', $data);

        $response->assertStatus(200)->assertExactJson([
            'status' => 200,
            'message' => 'Task created',
        ]);

        $data['due_date'] = '2023-12-31 10:00:00';

        $this->assertDatabaseHas('tasks', [
            'assigned_to' => $assignedToId,
            'title' => $title,
            'description' => $description,
            'due_date' => '2023-12-31 10:00:00',
            'status' => $status,
            'created_by' => $createdById
        ]);
    }

    /**
     * Summary of test_task_can_update
     * @return void
     */
    public function test_task_can_update(): void
    {
        $task = Task::inRandomOrder()->first();

        $assignedToId = User::inRandomOrder()->first()->id;
        $title = 'Sample Task Title Update';
        $description = 'This is a sample task description Update.';
        $dueDate = '2023-12-30 12:00';
        $status = 'pending';
        $createdById = User::inRandomOrder()->first()->id;

        $data = [
            'assigned_to_id' => $assignedToId,
            'title' => $title,
            'description' => $description,
            'due_date' => $dueDate,
            'status' => $status,
            'created_by_id' => $createdById,
        ];

        $response = $this->putJson('/api/v1/tasks/update/' . $task->id, $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'assigned',
                    'title',
                    'description',
                    'due_date',
                    'status',
                    'created_by',
                    'created_at',
                    'updated_at'
                ]
            ]);

        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'assigned_to' => $assignedToId,
            'title' => $title,
            'description' => $description,
            'due_date' => '2023-12-30 12:00:00',
            'status' => $status,
            'created_by' => $createdById
        ]);
    }

    /**
     * Summary of test_task_can_delete
     * @return void
     */
    public function test_task_can_delete(): void
    {
        $taskId = Task::inRandomOrder()->first()->id;

        $response = $this->deleteJson('/api/v1/tasks/delete/' . $taskId);

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'status' => 200,
                'message' => 'Task Deleted',
            ]);

        $this->assertSoftDeleted('tasks', [
            'id' => $taskId,
        ]);
    }
}
