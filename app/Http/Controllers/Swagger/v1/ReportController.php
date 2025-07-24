<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class ReportController extends Controller
{

    #[OA\Get(path: '/api/v1/reports', description: 'All Reports', tags: ['Report'])]
    #[OA\Response(response: 200, description: 'Report list')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Report not found')]
    public function index()
    {
        //
    }

    #[OA\Get(path: '/api/v1/reports/{id}', tags: ['Report'])]
    #[OA\Parameter(name: 'id', in: 'path', required: true, description: 'Report id', example: 1)]
    #[OA\Response(response: 200, description: 'Report by id')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Report not found')]
    public function show()
    {
        //
    }

    #[OA\Post(path: '/api/v1/reports/create', description: 'Report Creation', tags: ['Report'])]
    #[OA\RequestBody(
        required: true,
        description: 'Report creation information',
        content: new OA\MediaType(
            mediaType: "multipart/form-data",
            schema: new OA\Schema(
                required: ['title', 'type', 'generated_by', 'file', 'description'],
                properties: [
                    new OA\Property(property: 'title', type: 'string', example: 'Monthly Report'),
                    new OA\Property(property: 'type', type: 'string', example: 'Financial'),
                    new OA\Property(property: 'generated_by', type: 'integer', example: 1),
                    new OA\Property(property: 'file', type: 'string', format: 'binary'),
                    new OA\Property(property: 'description', type: 'string', example: 'Detailed financial report for the month.'),
                ]
            ),
        )
    )]
    #[OA\Response(response: 200, description: 'Report created')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Report not found')]
    public function create()
    {
        //
    }

    #[OA\Post(path: '/api/v1/reports/update/{id}', description: 'Report Update', tags: ['Report'])]
    #[OA\RequestBody(
        required: true,
        description: 'Report update information',
        content: new OA\MediaType(
            mediaType: "multipart/form-data",
            schema: new OA\Schema(
                required: ['title', 'type', 'generated_by', 'file', 'description'],
                properties: [
                    new OA\Property(property: 'title', type: 'string', example: 'Monthly Report'),
                    new OA\Property(property: 'type', type: 'string', example: 'Financial'),
                    new OA\Property(property: 'generated_by', type: 'integer', example: 1),
                    new OA\Property(property: 'file', type: 'string', format: 'binary'),
                    new OA\Property(property: 'description', type: 'string', example: 'Detailed financial report for the month.'),
                    new OA\Property(property: "_method", type: "string", enum: ["PUT"], example: "PUT", nullable: false),
                ]
            )
        )
    )]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Report Id", example: 1)]
    #[OA\Response(response: 200, description: 'Report created')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Report not found')]
    public function update()
    {
        //
    }

    #[OA\Delete(path: "/api/v1/reports/delete/{id}", description: "Report delete", tags: ["Report"])]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Report Id", example: 1)]
    #[OA\Response(response: 200, description: 'Report deleted')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Report not found')]
    public function delete()
    {
        //
    }
}
