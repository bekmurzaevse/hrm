<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class TestResultController extends Controller
{
    #[OA\Get(
        path: '/api/v1/test-results',
        description: "All Test Results",
        tags: ["TestResult"],
        summary: "All Test Results",
    )]
    #[OA\Response(response: 200, description: 'Successfully received')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Test Result not found")]
    public function index()
    {
        //
    }

    #[OA\Get(path: '/api/v1/test-results/{id}', tags: ["TestResult"], summary: "Test Result by id",
    // security: [['sanctum' => []]]
    )]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Test Result id", example: 1)]
    #[OA\Response(response: 200, description: 'Test Result by id')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: "Test Result not found")]
    public function show()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/test-results/create',
        description: 'Jana Test Result jaratiw',
        summary: 'Test Result jaratiw',
        tags: ['TestResult'],
        // security: [['sanctum' => []]]
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ['test_id', 'user_id', 'score'],
                properties: [
                    new OA\Property(property: 'test_id', type: 'integer', example: 1),
                    new OA\Property(property: 'user_id', type: 'integer', example: 2),
                    new OA\Property(property: 'score', type: 'number', format: 'float', example: 86.5),
                ]
            )
        ),
    )]
    #[OA\Response(response: 201, description: 'Test Result jaratildi')]
    #[OA\Response(response: 400, description: 'Bad Request')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    public function create()
    {
        //
    }

    #[OA\Put(
        path: '/api/v1/test-results/update/{id}',
        description: "Test Result jan'alaw",
        summary: "Test Result jan'alaw",
        tags: ["TestResult"],
        parameters: [
            new OA\Parameter(
                name: "id",
                in: "path",
                required: true,
                description: "Test Result id",
                schema: new OA\Schema(type: "integer", example: 2)
            )
        ],
    )]
    #[OA\RequestBody(
        required: true,
        description: "Test Result jan'alaw ushin kerekli mag'liwmatlar",
        content: new OA\JsonContent(
            required: ["test_id", "user_id", "score"],
            properties: [
                new OA\Property(property: "test_id", type: "integer", example: 2),
                new OA\Property(property: "user_id", type: "integer", example: 1),
                new OA\Property(property: "score", type: "number", format: "float", example: 85)
            ]
        )
    )]
    #[OA\Response(response: 200, description: "Test Result janalandi")]
    #[OA\Response(response: 404, description: "Test Result tabilmadı")]
    #[OA\Response(response: 401, description: "Unauthorized")]
    public function update()
    {
        //
    }
    
    #[OA\Delete(
        path: '/api/v1/test-results/delete/{id}',
        description: "Test Result o'shiriw",
        summary: "Test Result o'shiriw",
        tags: ["TestResult"],
        parameters: [
            new OA\Parameter(
                name: "id",
                in: "path",
                required: true,
                description: "Test Result ID",
                schema: new OA\Schema(type: "integer", example: 1)
            )
        ]
    )]
    #[OA\Response(response: 200, description: "Test Result o'shirildi")]
    #[OA\Response(response: 404, description: "Test Result tabilmadı")]
    #[OA\Response(response: 401, description: "Unauthorized")]
    public function delete()
    {
        //
    }
}