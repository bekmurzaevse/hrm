<?php

namespace App\Actions\v1\CandidateDocument;

use App\Exceptions\ApiResponseException;
use App\Models\Candidate;
use App\Models\CandidateDocument;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class DeleteAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        try {
            $document = Candidate::firstOrFail()
                ->documents()
                ->where('id', $id)
                ->firstOrFail();

            $filePath = $document->path;    

            if (Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }

            $document->delete();

            return static::toResponse(
                message: 'Candidate Document Deleted'
            );

        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Document Not Found', 404);
        }
    }
}