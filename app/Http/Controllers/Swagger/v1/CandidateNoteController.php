<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class CandidateNoteController extends Controller
{
    #[OA\Get(
        path: '/api/v1/candidate-notes',
        description: "All Candidate Notes",
        tags: ["CandidateNote"],
        summary: "All Candidate Notes",
    )]
    #[OA\Response(response: 200, description: 'Successfully received')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Candidate Note not found")]
    public function index()
    {
        //
    }

    #[OA\Get(path: '/api/v1/candidate-notes/{id}', tags: ["CandidateNote"], summary: "Candidate Note by id",
    // security: [['sanctum' => []]]
    )]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Candidate Note id", example: 1)]
    #[OA\Response(response: 200, description: 'Candidate Note by id')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: "Candidate Note not found")]
    public function show()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/candidate-notes/create',
        description: 'Jana Candidate Note jaratiw',
        summary: 'Candidate Note jaratiw',
        tags: ['CandidateNote'],
        // security: [['sanctum' => []]]
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ['candidate_id', 'user_id', 'note'],
                properties: [
                    new OA\Property(property: 'candidate_id', type: 'integer', example: 1),
                    new OA\Property(property: 'user_id', type: 'integer', example: 2),
                    new OA\Property(property: 'note', type: 'string', example: "Candidate jaqsi qatnasti"), 
                ]
            )
        ),
    )]
    #[OA\Response(response: 201, description: 'Candidate Note jaratildi')]
    #[OA\Response(response: 400, description: 'Bad Request')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    public function create()
    {
        //
    }

    #[OA\Put(
        path: '/api/v1/candidate-notes/update/{id}',
        description: "Candidate Note jan'alaw",
        summary: "Candidate Note jan'alaw",
        tags: ["CandidateNote"],
        parameters: [
            new OA\Parameter(
                name: "id",
                in: "path",
                required: true,
                description: "Candidate Note id",
                schema: new OA\Schema(type: "integer", example: 2)
            )
        ],
    )]
    #[OA\RequestBody(
        required: true,
        description: "Candidate Note jan'alaw ushin kerekli mag'liwmatlar",
        content: new OA\JsonContent(
            required: ["candidate_id", "user_id", "score"],
            properties: [
                new OA\Property(property: "candidate_id", type: "integer", example: 2),
                new OA\Property(property: "user_id", type: "integer", example: 1),
                new OA\Property(property: "note", type: "string", example: "Candidate jaqsi qatnasti, biraq texnik bilimler az"),
            ]
        )
    )]
    #[OA\Response(response: 200, description: "Candidate Note janalandi")]
    #[OA\Response(response: 404, description: "Candidate Note tabilmadı")]
    #[OA\Response(response: 401, description: "Unauthorized")]
    public function update()
    {
        //
    }
    
    #[OA\Delete(
        path: '/api/v1/candidate-notes/delete/{id}',
        description: "Candidate Note o'shiriw",
        summary: "Candidate Note o'shiriw",
        tags: ["CandidateNote"],
        parameters: [
            new OA\Parameter(
                name: "id",
                in: "path",
                required: true,
                description: "CandidateNote ID",
                schema: new OA\Schema(type: "integer", example: 1)
            )
        ]
    )]
    #[OA\Response(response: 200, description: "Candidate Note o'shirildi")]
    #[OA\Response(response: 404, description: "Candidate Note tabilmadı")]
    #[OA\Response(response: 401, description: "Unauthorized")]
    public function delete()
    {
        //
    }
}