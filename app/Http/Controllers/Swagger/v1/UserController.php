<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class UserController extends Controller
{

    #[OA\Get(
        path: '/api/v1/users',
        description: "All User",
        tags: ["User"],
        summary: "All User",
    )]
    #[OA\Response(response: 200, description: 'User list')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "User not found")]
    public function index()
    {
        //
    }

    #[OA\Get(path: '/api/v1/users/{id}', tags: ["User"], summary: "User by id",
    // security: [['sanctum' => []]]
    )]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "User id", example: 1)]
    #[OA\Response(response: 200, description: 'User by id')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: "User not found")]
    public function show()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/users/create',
        description: "User jaratiw",
        tags: ["User"],
        summary: "User jaratiw",
        // security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        description: "User jaratiw ushin mag'liwmatlar",
        content: new OA\JsonContent(
            required: ["first_name", "last_name", "email", "phone", "password"],
            properties: [
                new OA\Property(
                    property: "first_name",
                    type: "string",
                    example: "test firstName"
                ),
                new OA\Property(
                    property: "last_name",
                    type: "string",
                    example: "test lastName"
                ),
                new OA\Property(
                    property: "email",
                    type: "string",
                    example: "test@gmail.com"
                ),
                new OA\Property(
                    property: "phone",
                    type: "string",
                    example: "998998888888"
                ),
                new OA\Property(
                    property: "password",
                    type: "string",
                ),
            ]
        )
    )]
    #[OA\Response(response: 200, description: 'User jaratildi')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "User tabilmadi")]
    public function create()
    {
        //
    }

    #[OA\Put(
        path: "/api/v1/users/update/{id}",
        summary: "User di jan'alaw",
        tags: ["User"],
        // security: [["sanctum" => []]],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ["first_name", "last_name", "email", "phone", "password"],
                properties: [
                    new OA\Property(
                    property: "first_name",
                    type: "string",
                    example: "test firstName"
                    ),
                    new OA\Property(
                        property: "last_name",
                        type: "string",
                        example: "new test lastName"
                    ),
                    new OA\Property(
                        property: "email",
                        type: "string",
                        example: "newtest@gmail.com"
                    ),
                    new OA\Property(
                        property: "phone",
                        type: "string",
                        example: "998998888889"
                    ),
                    new OA\Property(
                        property: "password",
                        type: "string",
                    ),
                ]
            )
        )
    )]
    #[OA\Parameter(
        name: "id",
        in: "path",
        required: true,
        description: "id arqali User jan'law",
        example: 1
    )]
    #[OA\Response(response: 200, description: 'User jaratildi')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "User tabilmadi")]
    public function update()
    {
        //
    }

    #[OA\Delete(
        path: "/api/v1/users/delete/{id}",
        summary: "User ti o'shiriw",
        tags: ["User"],
        // security: [["sanctum" => []]],
        parameters: [
            new OA\Parameter(name: "id", in: "path", required: true, schema: new OA\Schema(type: "integer"))],
        responses: [
            new OA\Response(response: 200, description: "User o'shirildi"),
            new OA\Response(response: 401, description: "Not allowed"),
            new OA\Response(response: 404, description: "User tabilmadi"),
        ]
    )]
    public function delete()
    {
        //
    }
}
