<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class CourseMaterialController extends Controller
{
    #[OA\Get(
        path: '/api/v1/course-materials',
        description: "Barliq Course Material",
        tags: ["CourseMaterial"],
        summary: "All Course Materials",
    )]
    #[OA\Parameter(name: "course_id", in: "query", required: true, description: "Course id", example: 1)]
    #[OA\Response(response: 200, description: 'Successfully received')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Course Material not found")]
    public function index()
    {
        //
    }

    #[OA\Get(path: '/api/v1/course-materials/{id}', tags: ["CourseMaterial"], summary: "Course Material by id",
        // security: [['sanctum' => []]]
    )]
    #[OA\Parameter(name: "course_id", in: "query", required: true, description: "Course id", example: 1)]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "CourseMaterial id", example: 1)]
    #[OA\Response(response: 200, description: 'Course Material by id')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: "Course Material not found")]
    public function show()
    {
        //
    }

    #[OA\Post(path: '/api/v1/course-materials/create', summary: "Create CourseMaterial", tags: ["CourseMaterial"],
    // security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        content: new OA\MediaType(
            mediaType: "multipart/form-data",
            schema: new OA\Schema(
                required: ["course_id", "file"],
                properties: [
                    new OA\Property(property: "name", type: "string", example: "Material name"),
                    new OA\Property(property: "course_id", type: "integer", example: 1),
                    new OA\Property(property: "description", type: "string", example: "description"),
                    new OA\Property(property: "file", type: "string", format: "binary"),
                ]
            ),
        )
    )]
    #[OA\Response(response: 200, description: "CourseMaterial Created")]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 422, description: "Validation Error")]
    #[OA\Response(response: 500, description: "Internal Server Error")]
    public function create()
    {
        //
    }

    #[OA\Post(path: '/api/v1/course-materials/update/{id}', tags: ["CourseMaterial"], summary: "Update Course Material",
        // security: [['sanctum' => []]]
    )]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Course Material id", example: 1)]
    #[OA\RequestBody(
        required: true,
        content: new OA\MediaType(
            mediaType: "multipart/form-data",
            schema: new OA\Schema(
                required: ["course_id", "file", "_method"],
                properties: [
                    new OA\Property(property: "name", type: "string", example: "Updated Material name"),
                    new OA\Property(property: "course_id", type: "integer", example: 1),
                    new OA\Property(property: "description", type: "string", example: "Updated description"),
                    new OA\Property(property: "file", type: "string", format: "binary"),
                    new OA\Property(property: "_method", type: "string", example: "PUT"),
                ]
            ),
        )
    )]
    #[OA\Response(response: 200, description: "Course Material updated")]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 422, description: "Validation Error")]
    public function update()
    {
        //
    }

    #[OA\Delete(path: '/api/v1/course-materials/delete/{id}', tags: ["CourseMaterial"], summary: "Delete Course Material",
        // security: [['sanctum' => []]]
    )]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Course Material id", example: 1)]
    #[OA\Parameter(name: "course_id", in: "query", required: true, description: "Course id", example: 1)]
    #[OA\Response(response: 200, description: 'Course Material deleted')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: "Course Material not found")]
    public function delete()
    {
        //
    }

    #[OA\Get(path: '/api/v1/course-materials/download/{id}', tags: ["CourseMaterial"], summary: "Download Course Material",
        // security: [['sanctum' => []]]
    )]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Course Material id", example: 1)]
    #[OA\Parameter(name: "course_id", in: "query", required: true, description: "Course id", example: 1)]
    #[OA\Response(response: 200, description: 'Course Material downloaded')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: "Course Material not found")]
    public function download()
    {
        //
    }
    
}