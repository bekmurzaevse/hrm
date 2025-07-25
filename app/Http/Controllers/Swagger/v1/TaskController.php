<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class TaskController extends Controller
{

    #[OA\Get(path: '/api/v1/tasks', description: 'All Tasks', tags: ['Task'])]
    #[OA\Response(response: 200, description: 'Task list')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Task not found')]
    public function index()
    {
        //
    }

    #[OA\Get(path: '/api/v1/tasks/{id}', tags: ['Task'])]
    #[OA\Parameter(name: 'id', in: 'path', required: true, description: 'Task id', example: 1)]
    #[OA\Response(response: 200, description: 'Task by id')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Task not found')]
    public function show()
    {
        //
    }

    #[OA\Post(path: '/api/v1/tasks/create', description: 'Task Creation', tags: ['Task'])]
    #[OA\RequestBody(
        required: true,
        description: 'Task creation information',
        content: new OA\JsonContent(
            required: ['assigned_to_id', 'title', 'description', 'due_date', 'status', 'created_by_id'],
            properties: [
                new OA\Property(property: 'assigned_to_id', type: 'integer', example: 1),
                new OA\Property(property: 'title', type: 'string', example: 'Task Title'),
                new OA\Property(property: 'description', type: 'string', example: 'Task Description'),
                new OA\Property(property: 'due_date', type: 'string', format: 'date', example: '2023-10-01 10:00'),
                new OA\Property(property: 'status', type: 'string', example: 'pending'),
                new OA\Property(property: 'created_by_id', type: 'integer', example: 1),
            ]
        )
    )]
    #[OA\Response(response: 200, description: 'Task created')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Task not found')]
    public function create()
    {
        //
    }

    #[OA\Put(path: '/api/v1/tasks/update/{id}', description: 'Task Update', tags: ['Task'])]
    #[OA\RequestBody(
        required: true,
        description: 'Task update information',
        content: new OA\JsonContent(
            required: ['assigned_to_id', 'title', 'description', 'due_date', 'status', 'created_by_id'],
            properties: [
                new OA\Property(property: 'assigned_to_id', type: 'integer', example: 1),
                new OA\Property(property: 'title', type: 'string', example: 'Task Title'),
                new OA\Property(property: 'description', type: 'string', example: 'Task Description'),
                new OA\Property(property: 'due_date', type: 'string', format: 'date', example: '2023-10-01 10:00'),
                new OA\Property(property: 'status', type: 'string', example: 'pending'),
                new OA\Property(property: 'created_by_id', type: 'integer', example: 1),
            ]
        )
    )]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Task Id", example: 1)]
    #[OA\Response(response: 200, description: 'Task created')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Task not found')]
    public function update()
    {
        //
    }

    #[OA\Delete(path: "/api/v1/tasks/delete/{id}", description: "Task delete", tags: ["Task"])]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Task Id", example: 1)]
    #[OA\Response(response: 200, description: 'Task deleted')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Task not found')]
    public function delete()
    {
        //
    }
}
