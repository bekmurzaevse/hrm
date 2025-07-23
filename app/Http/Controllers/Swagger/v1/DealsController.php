<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class DealsController extends Controller
{

    #[OA\Get(
        path: '/api/v1/deals',
        description: "All Deals",
        tags: ["Deals"],
        summary: "All Deals",
    )]
    #[OA\Response(response: 200, description: 'Deals list')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Deals not found")]
    public function index()
    {
        //
    }

    #[OA\Get(path: '/api/v1/deals/{id}', tags: ["Deals"], summary: "Deals by id",
    // security: [['sanctum' => []]]
    )]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Deals id", example: 1)]
    #[OA\Response(response: 200, description: 'Deals by id')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: "Deals not found")]
    public function show()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/deals/create',
        description: "Deals jaratiw",
        tags: ["Deals"],
        summary: "Deals jaratiw",
        // security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        description: "Deals jaratiw ushin mag'liwmatlar",
        content: new OA\JsonContent(
            required: ["client_id", "value"],
            properties: [
                new OA\Property(
                    property: "client_id",
                    type: "integer",
                    example: 1
                ),
                new OA\Property(
                    property: "value",
                    type: "integer",
                    example: 1500
                ),
                new OA\Property(
                    property: "description",
                    type: "string",
                    example: "description"
                ),
            ]
        )
    )]
    #[OA\Response(response: 200, description: 'Deals jaratildi')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Deals tabilmadi")]
    public function create()
    {
        //
    }

    #[OA\Put(
        path: "/api/v1/deals/update/{id}",
        summary: "Deals di jan'alaw",
        tags: ["Deals"],
        // security: [["sanctum" => []]],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ["client_id", "value"],
                properties: [
                    new OA\Property(
                        property: "client_id",
                        type: "integer",
                        example: 1
                    ),
                    new OA\Property(
                        property: "value",
                        type: "integer",
                        example: 1400
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
        description: "id arqali Deals jan'law",
        example: 1
    )]
    #[OA\Response(response: 200, description: 'Deals jaratildi')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Deals tabilmadi")]
    public function update()
    {
        //
    }

    #[OA\Delete(
        path: "/api/v1/deals/delete/{id}",
        summary: "Deals ti o'shiriw",
        tags: ["Deals"],
        // security: [["sanctum" => []]],
        parameters: [
            new OA\Parameter(name: "id", in: "path", required: true, schema: new OA\Schema(type: "integer"))],
        responses: [
            new OA\Response(response: 200, description: "Deals o'shirildi"),
            new OA\Response(response: 401, description: "Not allowed"),
            new OA\Response(response: 404, description: "Deals tabilmadi"),
        ]
    )]
    public function delete()
    {
        //
    }


}
