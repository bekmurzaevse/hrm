<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class CourseController extends Controller
{
    #[OA\Get(
        path: '/api/v1/courses',
        description: "All Courses",
        tags: ["Course"],
        summary: "All Courses",
    )]
    #[OA\Response(response: 200, description: 'Successfully received')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Courses not found")]
    public function index()
    {
        //
    }

    #[OA\Get(path: '/api/v1/courses/{id}', tags: ["Course"], summary: "Courses by id",
    // security: [['sanctum' => []]]
    )]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Course id", example: 1)]
    #[OA\Response(response: 200, description: 'Courses by id')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: "Courses not found")]
    public function show()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/courses/create',
        description: "Jana kurs jaratiw",
        tags: ["Course"],
        summary: "Kurs jaratiw",
        // security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        description: "Kurs jaratiw ushin kerekli mag'liwmatlar",
        content: new OA\JsonContent(
            required: ["title", "created_by"],
            properties: [
                new OA\Property(
                    property: "title",
                    type: "string",
                    example: "Laravel Backend Course"
                ),
                new OA\Property(
                    property: "description",
                    type: "string",
                    example: "PHP ha'm Laravel framework tiykarlari"
                ),
                new OA\Property(
                    property: "created_by",
                    type: "integer",
                    example: 2
                ),
            ]
        )
    )]
    #[OA\Response(response: 200, description: 'Course created')]
    #[OA\Response(response: 401, description: 'Unauthorized')]
    #[OA\Response(response: 422, description: 'Validation error')]
    public function create()
    {
        //
    }

    #[OA\Put(
        path: '/api/v1/courses/update/{id}',
        description: "Course janalaw",
        summary: "Course janalaw",
        tags: ["Course"],
        // security: [['sanctum' => []]]
        parameters: [
            new OA\Parameter(
                name: "id",
                in: "path",
                required: true,
                description: "Course id",
                schema: new OA\Schema(type: "integer", example: 3)
            )
        ],
    )]
    #[OA\RequestBody(
        required: true,
        description: "Course jan'alaw ushin kerekli mag'liwmatlar",
        content: new OA\JsonContent(
            required: ["title", "created_by"],
            properties: [
                new OA\Property(property: "title", type: "string", example: "Updated Laravel Course"),
                new OA\Property(property: "description", type: "string", example: "Laravel course description (optional)"),
                new OA\Property(property: "created_by", type: "integer", example: 1),
            ]
        )
    )]
    #[OA\Response(response: 200, description: "Course janalandi")]
    #[OA\Response(response: 404, description: "Course tabilmadı")]
    #[OA\Response(response: 401, description: "Unauthorized")]
    public function update()
    {
        //
    }

    #[OA\Delete(
        path: '/api/v1/courses/delete/{id}',
        description: "Berilgen ID boyınsha Course o'shiriw",
        summary: "Course o'shiriw",
        tags: ["Course"],
        // security: [['sanctum' => []]]
        parameters: [
            new OA\Parameter(
                name: 'id',
                in: 'path',
                required: true,
                description: 'Course ID',
                schema: new OA\Schema(type: 'integer', example: 1)
            ),
        ],
    )]
    #[OA\Response(response: 200, description: "Course o'shirildi")]
    #[OA\Response(response: 404, description: "Course tabilmadı")]
    #[OA\Response(response: 401, description: "Unauthorized")]
    public function delete()
    {
        //
    }
}