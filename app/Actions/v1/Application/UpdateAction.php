<?php

namespace App\Actions\v1\Application;

use App\Dto\v1\Application\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Application\ApplicationResource;
use App\Models\Application;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\Application\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $data = Application::findOrFail($id);
            $data->update([
                'candidate_id' => $dto->candidateId,
                'vacancy_id' => $dto->vacancyId,
                'current_stage' => $dto->currentStage,
                'applied_at' => $dto->appliedAt,
            ]);

            return static::toResponse(
                message: 'Application Updated',
                data: new ApplicationResource($data)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Application Not Found', 404);
        }
    }
}