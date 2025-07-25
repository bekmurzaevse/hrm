<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class RecruitmenFunnelStageController extends Controller
{

    #[OA\Get(path: '/api/v1/recruitment-funnel-stages', description: 'All Recruitmen Funnel Stage', tags: ['Recruitmen Funnel Stage'])]
    #[OA\Response(response: 200, description: 'Recruitmen Funnel Stage list')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Recruitmen Funnel Stage not found')]
    public function index()
    {
        //
    }

    #[OA\Get(path: '/api/v1/recruitment-funnel-stages/{id}', tags: ['Recruitmen Funnel Stage'])]
    #[OA\Parameter(name: 'id', in: 'path', required: true, description: 'Recruitmen Funnel Stage id', example: 1)]
    #[OA\Response(response: 200, description: 'Recruitmen Funnel Stage by id')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Recruitmen Funnel Stage not found')]
    public function show()
    {
        //
    }

    #[OA\Post(path: '/api/v1/recruitment-funnel-stages/create', description: 'Recruitmen Funnel Stage Creation', tags: ['Recruitmen Funnel Stage'])]
    #[OA\RequestBody(
        required: true,
        description: 'Recruitmen Funnel Stage creation information',
        content: new OA\JsonContent(
            required: ['vacancy_id', 'stage_name', 'order'],
            properties: [
                new OA\Property(property: 'vacancy_id', type: 'integer', example: 2),
                new OA\Property(
                    property: 'stage_name',
                    type: 'string',
                    enum: [
                        'Application Received',
                        'Screening',
                        'Interview Scheduled',
                        'Interview Completed',
                        'Offer Extended',
                        'Offer Accepted',
                        'Hired',
                        'Rejected'
                    ],
                    example: 'Application Received'
                ),
                new OA\Property(property: 'order', type: 'integer', example: '1'),
            ]
        )
    )]
    #[OA\Response(response: 200, description: 'Recruitmen Funnel Stage created')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Recruitmen Funnel Stage not found')]
    public function create()
    {
        //
    }

    #[OA\Put(path: '/api/v1/recruitment-funnel-stages/update/{id}', description: 'Recruitmen Funnel Stage Update', tags: ['Recruitmen Funnel Stage'])]
    #[OA\RequestBody(
        required: true,
        description: 'Recruitmen Funnel Stage update information',
        content: new OA\JsonContent(
            required: ['vacancy_id', 'stage_name', 'order'],
            properties: [
                new OA\Property(property: 'vacancy_id', type: 'integer', example: 2),
                new OA\Property(
                    property: 'stage_name',
                    type: 'string',
                    enum: [
                        'Application Received',
                        'Screening',
                        'Interview Scheduled',
                        'Interview Completed',
                        'Offer Extended',
                        'Offer Accepted',
                        'Hired',
                        'Rejected'
                    ],
                    example: 'Application Received'
                ),
                new OA\Property(property: 'order', type: 'integer', example: '1'),
            ]
        )
    )]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Recruitmen Funnel Stage Id", example: 1)]
    #[OA\Response(response: 200, description: 'Recruitmen Funnel Stage created')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Recruitmen Funnel Stage not found')]
    public function update()
    {
        //
    }

    #[OA\Delete(path: "/api/v1/recruitment-funnel-stages/delete/{id}", description: "Recruitmen Funnel Stage delete", tags: ["Recruitmen Funnel Stage"])]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Recruitmen Funnel Stage Id", example: 1)]
    #[OA\Response(response: 200, description: 'Recruitmen Funnel Stage deleted')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Recruitmen Funnel Stage not found')]
    public function delete()
    {
        //
    }
}
