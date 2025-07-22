<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class ProjectController extends Controller
{

    #[OA\Get(
        path: '/api/v1/projects',
        description: "All Project",
        tags: ["Project"],
        summary: "All Project",
    )]
    #[OA\Response(response: 200, description: 'Project list')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Project not found")]
    public function index()
    {
        //
    }

    #[OA\Get(path: '/api/v1/projects/{id}', tags: ["Project"], summary: "Project by id",
    // security: [['sanctum' => []]]
    )]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Project id", example: 1)]
    #[OA\Response(response: 200, description: 'Project by id')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: "Project not found")]
    public function show()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/projects/create',
        description: "Project jaratiw",
        tags: ["Project"],
        summary: "Project jaratiw",
        // security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        description: "Project jaratiw ushin mag'liwmatlar",
        content: new OA\JsonContent(
            required: ["title", "created_by"],
            properties: [
                new OA\Property(
                    property: "title",
                    type: "string",
                    example: "project title"
                ),
                new OA\Property(
                    property: "status",
                    type: "string",
                    example: "active"
                ),
                new OA\Property(
                    property: "budget",
                    type: "integer",
                    example: 3500
                ),
                new OA\Property(
                    property: "deadline",
                    type: "date",
                ),
                new OA\Property(
                    property: "created_by",
                    type: "integer",
                    example: 1
                ),
            ]
        )
    )]
    #[OA\Response(response: 200, description: 'Project jaratildi')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Project tabilmadi")]
    public function create()
    {
        //
    }

    #[OA\Put(
        path: "/api/v1/projects/update/{id}",
        summary: "Project di jan'alaw",
        tags: ["Project"],
        // security: [["sanctum" => []]],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ["title", "created_by"],
                properties: [
                    new OA\Property(
                    property: "title",
                    type: "string",
                    example: "project title"
                    ),
                    new OA\Property(
                        property: "status",
                        type: "string",
                        example: "active"
                    ),
                    new OA\Property(
                        property: "budget",
                        type: "integer",
                        example: 3500
                    ),
                    new OA\Property(
                        property: "deadline",
                        type: "date",
                    ),
                    new OA\Property(
                        property: "created_by",
                        type: "integer",
                        example: 1
                    ),
                ]
            )
        )
    )]
    #[OA\Parameter(
        name: "id",
        in: "path",
        required: true,
        description: "id arqali Project jan'law",
        example: 1
    )]
    #[OA\Response(response: 200, description: 'Project jaratildi')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Project tabilmadi")]
    public function update()
    {
        //
    }

    #[OA\Delete(
        path: "/api/v1/projects/delete/{id}",
        summary: "Project ti o'shiriw",
        tags: ["Project"],
        // security: [["sanctum" => []]],
        parameters: [
            new OA\Parameter(name: "id", in: "path", required: true, schema: new OA\Schema(type: "integer"))
        ],
    )]
    #[OA\Response(response: 200, description: 'Project jaratildi')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Project tabilmadi")]
    public function delete()
    {
        //
    }
}
