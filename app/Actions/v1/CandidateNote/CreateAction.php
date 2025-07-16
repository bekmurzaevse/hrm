<?php

namespace App\Actions\v1\CandidateNote;

use App\Dto\v1\CandidateNote\CreateDto;
use App\Models\CandidateNote;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \App\Dto\v1\CandidateNote\CreateDto $dto
     * @return JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'candidate_id' => $dto->candidateId,
            'user_id'      => $dto->userId,
            'note'         => $dto->note,
        ];

        CandidateNote::create($data);

        return static::toResponse(
            message: 'Candidate Note Created Successfully'
        );
    }
}
