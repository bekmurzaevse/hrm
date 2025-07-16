<?php

namespace App\Actions\v1\CandidateNote;

use App\Exceptions\ApiResponseException;
use App\Models\CandidateNote;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

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
            $note = CandidateNote::findOrFail($id);
            $note->delete();

            return static::toResponse(
                message: "$id - id li Candidate Note o'shirildi",
            );
        } catch (ModelNotFoundException) {
            throw new ApiResponseException('Candidate Note Not Found', 404);
        }
    }
}