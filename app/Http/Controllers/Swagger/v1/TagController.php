<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class TagController extends Controller
{

    #[OA\Get(
        path: '/api/v1/tags',
    description: "All Tag",
        tags: ["Tag"],
        summary: "All Tag",
    )]
    #[OA\Response(response: 200, description: 'Tag list')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Tag not found")]
    public function index()
    {
        //
    }

    #[OA\Get(path: '/api/v1/tags/{id}', tags: ["Tag"], summary: "Tag by id",
    // security: [['sanctum' => []]]
    )]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Tag id", example: 1)]
    #[OA\Response(response: 200, description: 'Tag by id')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: "Tag not found")]
    public function show()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/tags/create',
        description: "Tag jaratiw",
        tags: ["Tag"],
        summary: "Tag jaratiw",
        // security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        description: "Tag jaratiw ushin mag'liwmatlar",
        content: new OA\JsonContent(
            required: ["name"],
            properties: [
                new OA\Property(
                    property: "name",
                    type: "string",
                    example: "tag name"
                ),
            ]
        )
    )]
    #[OA\Response(response: 200, description: 'Tag jaratildi')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Tag tabilmadi")]
    public function create()
    {
        //
    }

    #[OA\Put(
        path: "/api/v1/tags/update/{id}",
        summary: "Tag di jan'alaw",
        tags: ["Tag"],
        // security: [["sanctum" => []]],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ["name"],
                properties: [
                    new OA\Property(
                        property: "name",
                        type: "string",
                        example: "new name"
                    ),
                ]
            )
        )
    )]
    #[OA\Parameter(
        name: "id",
        in: "path",
        required: true,
        description: "id arqali Tag jan'law",
        example: 1
    )]
    #[OA\Response(response: 200, description: 'Tag jaratildi')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Tag tabilmadi")]
    public function update()
    {
        //
    }

    #[OA\Delete(
        path: "/api/v1/tags/delete/{id}",
        summary: "Tag ti o'shiriw",
        tags: ["Tag"],
        // security: [["sanctum" => []]],
        parameters: [
            new OA\Parameter(name: "id", in: "path", required: true, schema: new OA\Schema(type: "integer"))
        ],
    )]
    #[OA\Response(response: 200, description: 'Tag jaratildi')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Tag tabilmadi")]
    public function delete()
    {
        //
    }

}
