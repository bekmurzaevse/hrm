<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class TestController extends Controller
{
    #[OA\Get(
        path: '/api/v1/tests',
        description: "All Tests",
        tags: ["Test"],
        summary: "All Tests",
    )]
    #[OA\Response(response: 200, description: 'Successfully received')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Tests not found")]
    public function index()
    {
        //
    }

    #[OA\Get(path: '/api/v1/tests/{id}', tags: ["Test"], summary: "Tests by id",
    // security: [['sanctum' => []]]
    )]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Test id", example: 1)]
    #[OA\Response(response: 200, description: 'Tests by id')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: "Tests not found")]
    public function show()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/tests/create',
        description: "Jan'a test jaratiw",
        tags: ["Test"],
        summary: "Test jaratiw",
        // security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        description: "Test jaratiw ushin kerekli mag'liwmatlar",
        content: new OA\JsonContent(
            required: ["title", "course_id"],
            properties: [
                new OA\Property(
                    property: "title",
                    type: "string",
                    example: "Laravel Backend Test"
                ),
                new OA\Property(
                    property: "course_id",
                    type: "integer",
                    example: 2
                ),
            ]
        )
    )]
    #[OA\Response(response: 200, description: 'Test created')]
    #[OA\Response(response: 401, description: 'Unauthorized')]
    #[OA\Response(response: 422, description: 'Validation error')]
    public function create()
    {
        //
    }

    #[OA\Put(
        path: '/api/v1/tests/update/{id}',
        description: "Test jan'alaw",
        summary: "Test jan'alaw",
        tags: ["Test"],
        // security: [['sanctum' => []]]
        parameters: [
            new OA\Parameter(
                name: "id",
                in: "path",
                required: true,
                description: "Test id",
                schema: new OA\Schema(type: "integer", example: 3)
            )
        ],
    )]
    #[OA\RequestBody(
        required: true,
        description: "Test jan'alaw ushin kerekli mag'liwmatlar",
        content: new OA\JsonContent(
            required: ["title", "course_id"],
            properties: [
                new OA\Property(property: "title", type: "string", example: "Updated Laravel Test"),
                new OA\Property(property: "course_id", type: "integer", example: 1),
            ]
        )
    )]
    #[OA\Response(response: 200, description: "Test janalandi")]
    #[OA\Response(response: 404, description: "Test tabilmadı")]
    #[OA\Response(response: 401, description: "Unauthorized")]
    public function update()
    {
        //
    }

    #[OA\Delete(
        path: '/api/v1/tests/delete/{id}',
        description: "Berilgen ID boyınsha Test o'shiriw",
        summary: "Test o'shiriw",
        tags: ["Test"],
        // security: [['sanctum' => []]]
        parameters: [
            new OA\Parameter(
                name: 'id',
                in: 'path',
                required: true,
                description: 'Test ID',
                schema: new OA\Schema(type: 'integer', example: 1)
            ),
        ],
    )]
    #[OA\Response(response: 200, description: "Test o'shirildi")]
    #[OA\Response(response: 404, description: "Test tabilmadı")]
    #[OA\Response(response: 401, description: "Unauthorized")]
    public function delete()
    {
        //
    }
}