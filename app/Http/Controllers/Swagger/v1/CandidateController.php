<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class CandidateController extends Controller
{
    #[OA\Get(
        path: '/api/v1/candidates',
        description: "All Candidates",
        tags: ["Candidate"],
        summary: "All Candidate",
    )]
    #[OA\Response(response: 200, description: 'Successfully received')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Candidate Document not found")]
    public function index()
    {
        //
    }

    #[OA\Get(path: '/api/v1/candidates/{id}', tags: ["Candidate"], summary: "Candidate by id",
        // security: [['sanctum' => []]]
    )]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Candidate id", example: 1)]
    #[OA\Response(response: 200, description: 'Candidate by id')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: "Candidate not found")]
    public function show()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/candidates/create',
        description: 'Jana candidate jaratiw',
        summary: 'Candidate jaratiw',
        tags: ['Candidate'],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\MediaType(
                mediaType: "multipart/form-data",
                schema: new OA\Schema(
                    required: [
                        'first_name', 'last_name', 'email', 'phone',
                        'education', 'experience', 'status', 'photo'
                    ],
                    properties: [
                        new OA\Property(property: 'first_name', type: 'string', example: 'Ali'),
                        new OA\Property(property: 'last_name', type: 'string', example: 'Karimov'),
                        new OA\Property(property: 'email', type: 'string', format: 'email', example: 'ali@example.com'),
                        new OA\Property(property: 'phone', type: 'string', example: '+998901234567'),
                        new OA\Property(property: 'education', type: 'string', example: 'Bachelor in CS'),
                        new OA\Property(property: 'experience', type: 'string', example: '3 years in web development'),
                        new OA\Property(property: 'status', type: 'string', example: 'active'),
                        new OA\Property(
                            property: 'photo',
                            type: 'string',
                            format: 'binary',
                            description: 'Photo file'
                        ),
                    ],
                    type: 'object'
                )
            )
        )
    )]
    #[OA\Response(response: 201, description: 'Candidate created')]
    #[OA\Response(response: 400, description: 'Bad Request')]
    #[OA\Response(response: 401, description: 'Unauthorized')]
    public function create()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/candidates/update/{id}',
        summary: 'Candidate jan\'alaw',
        description: 'Berilgen ID boyinsha candidate jan\'alaw',
        tags: ['Candidate'],
        parameters: [
            new OA\Parameter(
                name: 'id',
                in: 'path',
                required: true,
                description: 'Candidate ID',
                schema: new OA\Schema(type: 'integer', example: 1)
            ),
        ],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\MediaType(
                mediaType: 'multipart/form-data',
                schema: new OA\Schema(
                    type: 'object',
                    required: ['first_name', 'last_name', 'email', 'phone', 'education', 'experience', 'status', 'photo'],
                    properties: [
                        new OA\Property(property: 'first_name', type: 'string', example: 'Jalal'),
                        new OA\Property(property: 'last_name', type: 'string', example: 'Ramanov'),
                        new OA\Property(property: 'email', type: 'string', format: 'email', example: 'jalal@example.com'),
                        new OA\Property(property: 'phone', type: 'string', example: '+998991234567'),
                        new OA\Property(property: 'education', type: 'string', example: 'Bachelor'),
                        new OA\Property(property: 'experience', type: 'string', example: '2 years'),
                        new OA\Property(property: 'status', type: 'string', example: 'active'),
                        new OA\Property(property: 'photo', type: 'string', format: 'binary'),
                        new OA\Property(property: '_method', type: 'string', example: 'PUT'),
                    ]
                )
            )
        ),
    )]
    #[OA\Response(response: 200, description: 'Candidate updated')]
    #[OA\Response(response: 404, description: 'Candidate not found')]
    #[OA\Response(response: 400, description: 'Bad Request')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    public function update()
    {
        // 
    }  
    
    #[OA\Delete(path: '/api/v1/candidates/delete/{id}', tags: ["Candidate"], summary: "Delete Candidate",
        // security: [['sanctum' => []]]
    )]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Candidate id", example: 1)]
    #[OA\Response(response: 200, description: 'Candidate deleted')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: "Candidate not found")]
    public function delete()
    {
        //
    }
    
}