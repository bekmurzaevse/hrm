<?php

namespace App\Actions\v1\CandidateDocument;

use App\Dto\v1\CandidateDocument\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Helpers\FileUploadHelper;
use App\Http\Resources\v1\CandidateDocument\CandidateDocumentResource;
use App\Models\Candidate;
use App\Models\CandidateDocument;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class UpdateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\CandidateDocument\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $doc = Candidate::findOrFail($dto->candidateId)->documents()->where('id', $id)->firstOrFail();

            $file = $dto->file;
            $filePath = $doc->path;

            if (Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }

            $path = FileUploadHelper::file($file, 'candidate_document');

            Candidate::findOrFail($dto->candidateId)->documents()->where('id', $id)->update([
                'name' => $dto->name,
                'path' => $path,
                'type' => 'candidate_document',
                'size' => $file->getSize(),
                'description' => $dto->description ?? null,
            ]);

            return static::toResponse(
                message: 'Candidate Document Updated',
                data: new CandidateDocumentResource($doc)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Document Not Found', 404);
        }
    }
}