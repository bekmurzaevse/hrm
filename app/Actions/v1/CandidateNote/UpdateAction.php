<?php

namespace App\Actions\v1\CandidateNote;

use App\Dto\v1\CandidateNote\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\CandidateNote\CandidateNoteResource;
use App\Models\CandidateNote;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\CandidateNote\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $note = CandidateNote::findOrFail($id);

            $note->update([
                'candidate_id' => $dto->candidateId,
                'user_id'      => $dto->userId,
                'note'         => $dto->note ?? $note->note,
            ]);

            return static::toResponse(
                message: "$id - id li Candidate Note jan'alandi",
                data: new CandidateNoteResource($note)
            );
        } catch (ModelNotFoundException) {
            throw new ApiResponseException('Candidate Note Not Found', 404);
        }
    }
}
