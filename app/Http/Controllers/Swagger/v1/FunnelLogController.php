<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class FunnelLogController extends Controller
{

    #[OA\Get(path: '/api/v1/funnel-logs', description: 'All Funnel Log', tags: ['Funnel Log'])]
    #[OA\Response(response: 200, description: 'Funnel Log list')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Funnel Log not found')]
    public function index()
    {
        //
    }

    #[OA\Get(path: '/api/v1/funnel-logs/{id}', tags: ['Funnel Log'])]
    #[OA\Parameter(name: 'id', in: 'path', required: true, description: 'Funnel Log id', example: 1)]
    #[OA\Response(response: 200, description: 'Funnel Log by id')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Funnel Log not found')]
    public function show()
    {
        //
    }

    #[OA\Post(path: '/api/v1/funnel-logs/create', description: 'Funnel Log Creation', tags: ['Funnel Log'])]
    #[OA\RequestBody(
        required: true,
        description: 'Funnel Log creation information',
        content: new OA\JsonContent(
            required: ['application_id', 'stage_id', 'moved_by'],
            properties: [
                new OA\Property(property: 'application_id', type: 'integer', example: 1),
                new OA\Property(property: 'stage_id', type: 'integer', example: 2),
                new OA\Property(property: 'moved_by', type: 'integer', example: 1),
            ]
        )
    )]
    #[OA\Response(response: 200, description: 'Funnel Log created')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Funnel Log not found')]
    public function create()
    {
        //
    }

    #[OA\Put(path: '/api/v1/funnel-logs/update/{id}', description: 'Funnel Log Update', tags: ['Funnel Log'])]
    #[OA\RequestBody(
        required: true,
        description: 'Funnel Log update information',
        content: new OA\JsonContent(
            required: ['application_id', 'stage_id', 'moved_by'],
            properties: [
                new OA\Property(property: 'application_id', type: 'integer', example: 1),
                new OA\Property(property: 'stage_id', type: 'integer', example: 2),
                new OA\Property(property: 'moved_by', type: 'integer', example: 1),
            ]
        )
    )]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Funnel Log Id", example: 1)]
    #[OA\Response(response: 200, description: 'Funnel Log created')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Funnel Log not found')]
    public function update()
    {
        //
    }

    #[OA\Delete(path: "/api/v1/funnel-logs/delete/{id}", description: "Funnel Log delete", tags: ["Funnel Log"])]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Funnel Log Id", example: 1)]
    #[OA\Response(response: 200, description: 'Funnel Log deleted')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Funnel Log not found')]
    public function delete()
    {
        //
    }
}
