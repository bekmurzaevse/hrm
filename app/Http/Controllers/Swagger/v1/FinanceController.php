<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class FinanceController extends Controller
{

    #[OA\Get(path: '/api/v1/finances', description: 'All Finances', tags: ['Finance'])]
    #[OA\Response(response: 200, description: 'Finance list')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Finance not found')]
    public function index()
    {
        //
    }

    #[OA\Get(path: '/api/v1/finances/{id}', tags: ['Finance'])]
    #[OA\Parameter(name: 'id', in: 'path', required: true, description: 'Finance id', example: 1)]
    #[OA\Response(response: 200, description: 'Finance by id')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Finance not found')]
    public function show()
    {
        //
    }

    #[OA\Post(path: '/api/v1/finances/create', description: 'Finance Creation', tags: ['Finance'])]
    #[OA\RequestBody(
        required: true,
        description: 'Finance creation information',
        content: new OA\JsonContent(
            required: ['type', 'client_id', 'vacancy_id', 'amount', 'category', 'note', 'date'],
            properties: [
                new OA\Property(property: 'type', type: 'string', example: 'Salary'),
                new OA\Property(property: 'client_id', type: 'integer', example: 2),
                new OA\Property(property: 'vacancy_id', type: 'integer', example: 2),
                new OA\Property(property: 'amount', type: 'number', format: 'float', minimum: 0, maximum: 9999999999.99, example: 12500.75),
                new OA\Property(property: 'category', type: 'string', example: 'Financial Category'),
                new OA\Property(property: 'note', type: 'string', example: 'Salary for October'),
                new OA\Property(property: 'date', type: 'string', format: 'date', example: '2025-12-01'),
            ]
        )
    )]
    #[OA\Response(response: 200, description: 'Finance created')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Finance not found')]
    public function create()
    {
        //
    }

    #[OA\Put(path: '/api/v1/finances/update/{id}', description: 'Finance Update', tags: ['Finance'])]
    #[OA\RequestBody(
        required: true,
        description: 'Finance update information',
        content: new OA\JsonContent(
            required: ['type', 'client_id', 'vacancy_id', 'amount', 'category', 'note', 'date'],
            properties: [
                new OA\Property(property: 'type', type: 'string', example: 'Salary'),
                new OA\Property(property: 'client_id', type: 'integer', example: 2),
                new OA\Property(property: 'vacancy_id', type: 'integer', example: 2),
                new OA\Property(property: 'amount', type: 'number', format: 'float', minimum: 0, maximum: 9999999999.99, example: 12500.75),
                new OA\Property(property: 'category', type: 'string', example: 'Financial Category'),
                new OA\Property(property: 'note', type: 'string', example: 'Salary for December'),
                new OA\Property(property: 'date', type: 'string', format: 'date', example: '2025-12-01'),
            ]
        )
    )]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Finance Id", example: 1)]
    #[OA\Response(response: 200, description: 'Finance created')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Finance not found')]
    public function update()
    {
        //
    }

    #[OA\Delete(path: "/api/v1/finances/delete/{id}", description: "Finance delete", tags: ["Finance"])]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Finance Id", example: 1)]
    #[OA\Response(response: 200, description: 'Finance deleted')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Finance not found')]
    public function delete()
    {
        //
    }
}
