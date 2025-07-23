<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class ClientController extends Controller
{

    #[OA\Get(
        path: '/api/v1/clients',
        description: "All Clients",
        tags: ["Client"],
        summary: "All Clients",
    )]
    #[OA\Response(response: 200, description: 'Client list')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Client not found")]
    public function index()
    {
        //
    }

    #[OA\Get(path: '/api/v1/clients/{id}', tags: ["Client"], summary: "Client by id",
    // security: [['sanctum' => []]]
    )]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Client id", example: 1)]
    #[OA\Response(response: 200, description: 'Client by id')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: "Client not found")]
    public function show()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/clients/create',
        description: "Client jaratiw",
        tags: ["Client"],
        summary: "Client jaratiw",
        // security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        description: "Client jaratiw ushin mag'liwmatlar",
        content: new OA\JsonContent(
            required: ["name", "contact_info", "created_by"],
            properties: [
                new OA\Property(
                    property: "name",
                    type: "string",
                    example: "Client name"
                ),
                new OA\Property(
                    property: "contact_info",
                    type: "string",
                    example: "998997777777"
                ),
                new OA\Property(
                    property: "created_by",
                    type: "integer",
                    example: 1
                ),
                new OA\Property(
                    property: "tags",
                    type: "array",
                    items: new OA\Items(type: "integer"),
                    example: [1,2]
                ),
            ]
        )
    )]
    #[OA\Response(response: 200, description: 'Client jaratildi')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Client tabilmadi")]
    public function create()
    {
        //
    }

    #[OA\Put(
        path: "/api/v1/clients/update/{id}",
        summary: "Client di jan'alaw",
        tags: ["Client"],
        // security: [["sanctum" => []]],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ["name", "contact_info", "created_by"],
                properties: [
                    new OA\Property(
                    property: "name",
                    type: "string",
                    example: "new Client name"
                    ),
                    new OA\Property(
                        property: "contact_info",
                        type: "string",
                        example: "998997777778"
                    ),
                    new OA\Property(
                        property: "created_by",
                        type: "integer",
                        example: 1
                    ),
                    new OA\Property(
                        property: "tags",
                        type: "array",
                        items: new OA\Items(type: "integer"),
                        example: [3,4]
                    ),
                ]
            )
        )
    )]
    #[OA\Parameter(
        name: "id",
        in: "path",
        required: true,
        description: "id arqali Client jan'law",
        example: 1
    )]
    #[OA\Response(response: 200, description: 'Client jaratildi')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Client tabilmadi")]
    public function update()
    {
        //
    }

    #[OA\Delete(
        path: "/api/v1/clients/delete/{id}",
        summary: "Client ti o'shiriw",
        tags: ["Client"],
        // security: [["sanctum" => []]],
        parameters: [new OA\Parameter(name: "id", in: "path", required: true, schema: new OA\Schema(type: "integer"))],
        responses: [
            new OA\Response(response: 200, description: "Client o'shirildi"),
            new OA\Response(response: 401, description: "Not allowed"),
            new OA\Response(response: 404, description: "Client tabilmadi"),
        ]
    )]
    public function delete()
    {
        //
    }
}
