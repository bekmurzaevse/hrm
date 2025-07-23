<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class HrDocumentController extends Controller
{

    #[OA\Get(
        path: '/api/v1/hr-documents',
        description: "All HrDocument",
        tags: ["HrDocument"],
        summary: "All HrDocument",
    )]
    #[OA\Parameter(name: "user_id", in: "query", required: true, description: "user id", example: 1)]
    #[OA\Response(response: 200, description: 'HrDocument list')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "HrDocument not found")]
    public function index()
    {
        //
    }

    #[OA\Get(path: '/api/v1/hr-documents/{id}', tags: ["HrDocument"], summary: "HrDocument by id",
    // security: [['sanctum' => []]]
    )]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "HrDocument id", example: 1)]
    #[OA\Parameter(name: "user_id", in: "query", required: true, description: "User id", example: 1)]
    #[OA\Response(response: 200, description: 'HrDocument by id')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: "HrDocument not found")]
    public function show()
    {
        //
    }

    #[OA\Post(path: '/api/v1/hr-documents/create', summary: "Create HrDocument", tags: ["HrDocument"],
    // security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        content: new OA\MediaType(
            mediaType: "multipart/form-data",
            schema: new OA\Schema(
                required: ["user_id", "file"],
                properties: [
                    new OA\Property(property: "name", type: "string", example: "hrDocument name"),
                    new OA\Property(property: "user_id", type: "integer", example: 1),
                    new OA\Property(property: "description", type: "string", example: "description"),
                    new OA\Property(property: "file", type: "string", format: "binary"),
                ]
            ),
        )
    )]
    #[OA\Response(response: 200, description: "HrDocument Created")]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 422, description: "Validation Error")]
    #[OA\Response(response: 500, description: "Internal Server Error")]
    public function create()
    {
        //
    }

    #[OA\Post(path: '/api/v1/hr-documents/update/{id}', summary: "Update HrDocument", tags: ["HrDocument"],
    // security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        content: new OA\MediaType(
            mediaType: "multipart/form-data",
            schema: new OA\Schema(
                required: ["user_id", "file", "_method"],
                properties: [
                    new OA\Property(property: "name", type: "string", example: "hrDocument name"),
                    new OA\Property(property: "user_id", type: "integer", example: 1),
                    new OA\Property(property: "description", type: "string", example: "description"),
                    new OA\Property(property: "file", type: "string", format: "binary"),
                    new OA\Property(property: "_method", type: "string", enum: ["PUT"], example: "PUT", nullable: false),
                ]
            ),
        )
    )]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "HrDocument id", example: 1)]
    #[OA\Response(response: 200, description: "HrDocument Updated")]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 422, description: "Validation Error")]
    #[OA\Response(response: 500, description: "Internal Server Error")]
    public function update()
    {
        //
    }

    #[OA\Delete(
        path: "/api/v1/hr-documents/delete/{id}",
        summary: "HrDocument ti o'shiriw",
        tags: ["HrDocument"],
        // security: [["sanctum" => []]],
    )]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "HrDocument id", example: 1)]
    #[OA\Parameter(name: "user_id", in: "query", required: true, description: "User id", example: 1)]
    #[OA\Response(response: 200, description: 'HrDocument by id')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: "HrDocument not found")]
    public function delete()
    {
        //
    }

    #[OA\Get(path: '/api/v1/hr-documents/download/{id}', tags: ["HrDocument"], summary: "HrDocument download by id",
    //  security: [['sanctum' => []]]
    )]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "HrDocument id", example: 1)]
    #[OA\Parameter(name: "user_id", in: "query", required: true, description: "User id", example: 1)]
    #[OA\Response(response: 200, description: 'HrDocument file by id')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: "HrDocument not found")]
    public function download()
    {
        //
    }
}
