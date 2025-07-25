<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class ApplicationController extends Controller
{

    #[OA\Get(path: '/api/v1/applications', description: 'All Applications', tags: ['Application'])]
    #[OA\Response(response: 200, description: 'Application list')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Application not found')]
    public function index()
    {
        //
    }

    #[OA\Get(path: '/api/v1/applications/{id}', tags: ['Application'])]
    #[OA\Parameter(name: 'id', in: 'path', required: true, description: 'Application id', example: 1)]
    #[OA\Response(response: 200, description: 'Application by id')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Application not found')]
    public function show()
    {
        //
    }

    #[OA\Post(path: '/api/v1/applications/create', description: 'Application Creation', tags: ['Application'])]
    #[OA\RequestBody(
        required: true,
        description: 'Application creation information',
        content: new OA\JsonContent(
            required: ['candidate_id', 'vacancy_id', 'current_stage', 'applied_at'],
            properties: [
                new OA\Property(property: 'candidate_id', type: 'integer', example: 1),
                new OA\Property(property: 'vacancy_id', type: 'integer', example: 2),
                new OA\Property(property: 'current_stage', type: 'integer', example: 3),
                new OA\Property(property: 'applied_at', type: 'string', example: '2023-10-01'),
            ]
        )
    )]
    #[OA\Response(response: 200, description: 'Application created')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Application not found')]
    public function create()
    {
        //
    }

    #[OA\Put(path: '/api/v1/applications/update/{id}', description: 'Application Update', tags: ['Application'])]
    #[OA\RequestBody(
        required: true,
        description: 'Application update information',
        content: new OA\JsonContent(
            required: ['candidate_id', 'vacancy_id', 'current_stage', 'applied_at'],
            properties: [
                new OA\Property(property: 'candidate_id', type: 'integer', example: 1),
                new OA\Property(property: 'vacancy_id', type: 'integer', example: 2),
                new OA\Property(property: 'current_stage', type: 'integer', example: 3),
                new OA\Property(property: 'applied_at', type: 'string', example: '2023-10-01'),
            ]
        )
    )]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Application Id", example: 1)]
    #[OA\Response(response: 200, description: 'Application created')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Application not found')]
    public function update()
    {
        //
    }

    #[OA\Delete(path: "/api/v1/applications/delete/{id}", description: "Application delete", tags: ["Application"])]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Application Id", example: 1)]
    #[OA\Response(response: 200, description: 'Application deleted')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Application not found')]
    public function delete()
    {
        //
    }
}
