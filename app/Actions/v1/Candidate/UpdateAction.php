<?php

namespace App\Actions\v1\Candidate;

use App\Dto\v1\Candidate\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Candidate\CandidateResource;
use App\Models\Candidate;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\Candidate\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $candidate = Candidate::findOrFail($id);
            $candidate->update([
                'first_name'   => $dto->firstName,
                'last_name'    => $dto->lastName,
                'email'        => $dto->email,
                'phone'        => $dto->phone,
                'education'    => $dto->education,
                'experience'   => $dto->experience,
                'photo_url'    => $dto->photoUrl,
                'status'       => $dto->status,
            ]);

            return static::toResponse(
                message: "$id - id li candidate jan'alandi",
                data: new CandidateResource($candidate)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Candidate Not Found', 404);
        }
    }
}