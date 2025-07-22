<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class InterActionController extends Controller
{

    #[OA\Get(
        path: '/api/v1/interactions',
        description: "All Interaction",
        tags: ["Interaction"],
        summary: "All Interaction",
    )]
    #[OA\Response(response: 200, description: 'Interaction list')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Interaction not found")]
    public function index()
    {
        //
    }

    #[OA\Get(path: '/api/v1/interactions/{id}', tags: ["Interaction"], summary: "Interaction by id",
    // security: [['sanctum' => []]]
    )]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Interaction id", example: 1)]
    #[OA\Response(response: 200, description: 'Interaction by id')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: "Interaction not found")]
    public function show()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/interactions/create',
        description: "Interaction jaratiw",
        tags: ["Interaction"],
        summary: "Interaction jaratiw",
        // security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        description: "Interaction jaratiw ushin mag'liwmatlar",
        content: new OA\JsonContent(
            required: ["client_id", "type", "notes", "user_id"],
            properties: [
                new OA\Property(
                    property: "client_id",
                    type: "integer",
                    example: 1
                ),
                new OA\Property(
                    property: "type",
                    type: "string",
                    example: "phone"
                ),
                new OA\Property(
                    property: "notes",
                    type: "string",
                    example: "notes"
                ),
                new OA\Property(
                    property: "user_id",
                    type: "integer",
                    example: 1
                ),
                new OA\Property(
                    property: "description",
                    type: "string",
                    example: "description"
                ),
            ]
        )
    )]
    #[OA\Response(response: 200, description: 'Interaction jaratildi')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Interaction tabilmadi")]
    public function create()
    {
        //
    }

    #[OA\Put(
        path: "/api/v1/interactions/update/{id}",
        summary: "Interaction di jan'alaw",
        tags: ["Interaction"],
        // security: [["sanctum" => []]],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ["client_id", "type", "notes", "user_id"],
                properties: [
                    new OA\Property(
                    property: "client_id",
                    type: "integer",
                    example: 1
                    ),
                    new OA\Property(
                        property: "type",
                        type: "string",
                        example: "phone"
                    ),
                    new OA\Property(
                        property: "notes",
                        type: "string",
                        example: "notes"
                    ),
                    new OA\Property(
                        property: "user_id",
                        type: "integer",
                        example: 1
                    ),
                    new OA\Property(
                        property: "description",
                        type: "string",
                        example: "description"
                    ),
                ]
            )
        )
    )]
    #[OA\Parameter(
        name: "id",
        in: "path",
        required: true,
        description: "id arqali Interaction jan'law",
        example: 1
    )]
    #[OA\Response(response: 200, description: 'Interaction jaratildi')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Interaction tabilmadi")]
    public function update()
    {
        //
    }

    #[OA\Delete(
        path: "/api/v1/interactions/delete/{id}",
        summary: "Interaction di o'shiriw",
        tags: ["Interaction"],
        // security: [["sanctum" => []]],
        parameters: [
            new OA\Parameter(name: "id", in: "path", required: true, schema: new OA\Schema(type: "integer"))],
        responses: [
            new OA\Response(response: 200, description: "Interaction o'shirildi"),
            new OA\Response(response: 401, description: "Not allowed"),
            new OA\Response(response: 404, description: "Interaction tabilmadi"),
        ]
    )]
    public function delete()
    {
        //
    }
}
