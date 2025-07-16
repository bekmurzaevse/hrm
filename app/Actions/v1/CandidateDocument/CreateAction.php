<?php

namespace App\Actions\v1\CandidateDocument;

use App\Dto\v1\CandidateDocument\CreateDto;
use App\Helpers\FileUploadHelper;
use App\Models\Candidate;
use App\Models\CandidateDocument;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \App\Dto\v1\CandidateDocument\CreateDto $dto
     * @return JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $file = $dto->file;
        $path = FileUploadHelper::file($file, 'candidate_document');

        Candidate::firstOrFail()->documents()->create([
            'name' => $dto->name,
            'path' => $path,
            'type' => 'candidate_document',
            'size' => $file->getSize(),
            'description' => $dto->description ?? null,
        ]);

        return static::toResponse(
            message: 'Candidate Document Created'
        );
    }
}