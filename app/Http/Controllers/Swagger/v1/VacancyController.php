<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class VacancyController extends Controller
{

    #[OA\Get(
        path: '/api/v1/vacancies',
        description: "All Vacancy",
        tags: ["Vacancy"],
        summary: "All Vacancy",
    )]
    #[OA\Response(response: 200, description: 'Vacancy list')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Vacancy not found")]
    public function index()
    {
        //
    }

    #[OA\Get(path: '/api/v1/vacancies/{id}', tags: ["Vacancy"], summary: "Vacancy by id",
    // security: [['sanctum' => []]]
    )]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Vacancy id", example: 1)]
    #[OA\Response(response: 200, description: 'Vacancy by id')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: "Vacancy not found")]
    public function show()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/vacancies/create',
        description: "Vacancy jaratiw",
        tags: ["Vacancy"],
        summary: "Vacancy jaratiw",
        // security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        description: "Vacancy jaratiw ushin mag'liwmatlar",
        content: new OA\JsonContent(
            required: ["title", "requirements", "recruiter_id", "project_id"],
            properties: [
                new OA\Property(
                    property: "title",
                    type: "string",
                    example: "vacancy title"
                ),
                new OA\Property(
                    property: "requirements",
                    type: "string",
                    example: "Senior"
                ),
                new OA\Property(
                    property: "salary",
                    type: "integer",
                    example: 1100
                ),
                new OA\Property(
                    property: "deadline",
                    type: "date"
                ),
                new OA\Property(
                    property: "recruiter_id",
                    type: "integer",
                    example: 1
                ),
                new OA\Property(
                    property: "project_id",
                    type: "integer",
                    example: 1
                ),
                new OA\Property(
                    property: "status",
                    type: "string",
                    example: "closed"
                ),
                new OA\Property(
                    property: "description",
                    type: "string",
                    example: "description"
                ),
            ]
        )
    )]
    #[OA\Response(response: 200, description: 'Vacancy jaratildi')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Vacancy tabilmadi")]
    public function create()
    {
        //
    }

    #[OA\Put(
        path: "/api/v1/vacancies/update/{id}",
        summary: "Vacancy di jan'alaw",
        tags: ["Vacancy"],
        // security: [["sanctum" => []]],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ["title", "requirements", "recruiter_id", "project_id"],
                properties: [
                    new OA\Property(
                        property: "title",
                        type: "string",
                        example: "vacancy title"
                    ),
                    new OA\Property(
                        property: "requirements",
                        type: "string",
                        example: "Senior"
                    ),
                    new OA\Property(
                        property: "salary",
                        type: "integer",
                        example: 1100
                    ),
                    new OA\Property(
                        property: "deadline",
                        type: "date",
                    ),
                    new OA\Property(
                        property: "recruiter_id",
                        type: "integer",
                        example: 1
                    ),
                    new OA\Property(
                        property: "project_id",
                        type: "integer",
                        example: 1
                    ),
                    new OA\Property(
                        property: "status",
                        type: "string",
                        example: "closed"
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
        description: "id arqali Vacancy jan'law",
        example: 1
    )]
    #[OA\Response(response: 200, description: 'Vacancy jaratildi')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Vacancy tabilmadi")]
    public function update()
    {
        //
    }

    #[OA\Delete(
        path: "/api/v1/vacancies/delete/{id}",
        summary: "Vacancy ti o'shiriw",
        tags: ["Vacancy"],
        // security: [["sanctum" => []]],
        parameters: [
            new OA\Parameter(name: "id", in: "path", required: true, schema: new OA\Schema(type: "integer"))],
        responses: [
            new OA\Response(response: 200, description: "Vacancy o'shirildi"),
            new OA\Response(response: 401, description: "Not allowed"),
            new OA\Response(response: 404, description: "Vacancy tabilmadi"),
        ]
    )]
    public function delete()
    {
        //
    }
}
