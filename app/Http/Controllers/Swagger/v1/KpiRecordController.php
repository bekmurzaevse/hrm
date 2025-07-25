<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class KpiRecordController extends Controller
{

    #[OA\Get(path: '/api/v1/kpi-records', description: 'All Kpi Records', tags: ['Kpi Record'])]
    #[OA\Response(response: 200, description: 'Kpi Record list')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Kpi Record not found')]
    public function index()
    {
        //
    }

    #[OA\Get(path: '/api/v1/kpi-records/{id}', tags: ['Kpi Record'])]
    #[OA\Parameter(name: 'id', in: 'path', required: true, description: 'Kpi Record id', example: 1)]
    #[OA\Response(response: 200, description: 'Kpi Record by id')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Kpi Record not found')]
    public function show()
    {
        //
    }

    #[OA\Post(path: '/api/v1/kpi-records/create', description: 'Kpi Record Creation', tags: ['Kpi Record'])]
    #[OA\RequestBody(
        required: true,
        description: 'Kpi Record creation information',
        content: new OA\JsonContent(
            required: ['user_id', 'vacancy_id', 'kpi_score', 'calculated_at'],
            properties: [
                new OA\Property(property: 'user_id', type: 'integer', example: 1),
                new OA\Property(property: 'vacancy_id', type: 'integer', example: 2),
                new OA\Property(property: 'kpi_score', type: 'number', format: 'float', minimum: 0, maximum: 999.99, example: 25.75),
                new OA\Property(property: 'calculated_at', type: 'string', format: 'date', example: '2023-10-01 10:00'),
            ]
        )
    )]
    #[OA\Response(response: 200, description: 'Kpi Record created')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Kpi Record not found')]
    public function create()
    {
        //
    }

    #[OA\Put(path: '/api/v1/kpi-records/update/{id}', description: 'Kpi Record Update', tags: ['Kpi Record'])]
    #[OA\RequestBody(
        required: true,
        description: 'Kpi Record update information',
        content: new OA\JsonContent(
            required: ['user_id', 'vacancy_id', 'kpi_score', 'calculated_at'],
            properties: [
                new OA\Property(property: 'user_id', type: 'integer', example: 1),
                new OA\Property(property: 'vacancy_id', type: 'integer', example: 2),
                new OA\Property(property: 'kpi_score', type: 'number', format: 'float', minimum: 0, maximum: 999.99, example: 25.75),
                new OA\Property(property: 'calculated_at', type: 'string', format: 'date', example: '2023-10-01 10:00'),
            ]
        )
    )]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Kpi Record Id", example: 1)]
    #[OA\Response(response: 200, description: 'Kpi Record created')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Kpi Record not found')]
    public function update()
    {
        //
    }

    #[OA\Delete(path: "/api/v1/kpi-records/delete/{id}", description: "Kpi Record delete", tags: ["Kpi Record"])]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Kpi Record Id", example: 1)]
    #[OA\Response(response: 200, description: 'Kpi Record deleted')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Kpi Record not found')]
    public function delete()
    {
        //
    }
}