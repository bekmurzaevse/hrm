<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class CandidateDocumentController extends Controller
{
    #[OA\Get(
        path: '/api/v1/candidate-documents',
        description: "Barliq Candidate Document",
        tags: ["CandidateDocument"],
        summary: "All Candidate Documents",
    )]
    #[OA\Parameter(name: "candidate_id", in: "query", required: true, description: "Candidate id", example: 1)]
    #[OA\Response(response: 200, description: 'Successfully received')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Candidate Document not found")]
    public function index()
    {
        //
    }

    #[OA\Get(path: '/api/v1/candidate-documents/{id}', tags: ["CandidateDocument"], summary: "Candidate Document by id",
        // security: [['sanctum' => []]]
    )]
    #[OA\Parameter(name: "candidate_id", in: "query", required: true, description: "Candidate id", example: 1)]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "CandidateDocument id", example: 1)]
    #[OA\Response(response: 200, description: 'Candidate Document by id')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: "Candidate Document not found")]
    public function show()
    {
        //
    }

    #[OA\Post(path: '/api/v1/candidate-documents/create', summary: "Create CandidateDocument", tags: ["CandidateDocument"],
    // security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        content: new OA\MediaType(
            mediaType: "multipart/form-data",
            schema: new OA\Schema(
                required: ["candidate_id", "file"],
                properties: [
                    new OA\Property(property: "name", type: "string", example: "Document name"),
                    new OA\Property(property: "candidate_id", type: "integer", example: 1),
                    new OA\Property(property: "description", type: "string", example: "description"),
                    new OA\Property(property: "file", type: "string", format: "binary"),
                ]
            ),
        )
    )]
    #[OA\Response(response: 200, description: "CandidateDocument Created")]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 422, description: "Validation Error")]
    public function create()
    {
        //
    }

    #[OA\Post(path: '/api/v1/candidate-documents/update/{id}', tags: ["CandidateDocument"], summary: "Update Candidate Document",
        // security: [['sanctum' => []]]
    )]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Candidate Document id", example: 1)]
    #[OA\RequestBody(
        required: true,
        content: new OA\MediaType(
            mediaType: "multipart/form-data",
            schema: new OA\Schema(
                required: ["candidate_id", "file", "_method"],
                properties: [
                    new OA\Property(property: "name", type: "string", example: "Updated Document name"),
                    new OA\Property(property: "candidate_id", type: "integer", example: 1),
                    new OA\Property(property: "description", type: "string", example: "Updated description"),
                    new OA\Property(property: "file", type: "string", format: "binary"),
                    new OA\Property(property: "_method", type: "string", example: "PUT"),
                ]
            ),
        )
    )]
    #[OA\Response(response: 200, description: "Candidate Document updated")]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: "Candidate Document not found")]
    public function update()
    {
        //
    }

    #[OA\Get(path: '/api/v1/candidate-documents/download/{id}', tags: ["CandidateDocument"], summary: "Download Candidate Document",
        // security: [['sanctum' => []]]
    )]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Candidate Document id", example: 1)]
    #[OA\Parameter(name: "candidate_id", in: "query", required: true, description: "Candidate id", example: 1)]
    #[OA\Response(response: 200, description: 'Candidate Document downloaded')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: "Candidate Document not found")]
    public function download()
    {
        //
    }

    #[OA\Delete(path: '/api/v1/candidate-documents/delete/{id}', tags: ["CandidateDocument"], summary: "Delete Candidate Document",
        // security: [['sanctum' => []]]
    )]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Candidate Document id", example: 1)]
    #[OA\Parameter(name: "candidate_id", in: "query", required: true, description: "Candidate id", example: 1)]
    #[OA\Response(response: 200, description: 'Candidate Document deleted')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: "Candidate Document not found")]
    public function delete()
    {
        //
    }
}