<?php

namespace App\Actions\v1\Application;

use App\Dto\v1\Application\CreateDto;
use App\Models\Application;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \App\Dto\v1\Application\CreateDto $dto
     * @return JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'candidate_id' => $dto->candidateId,
            'vacancy_id' => $dto->vacancyId,
            'current_stage' => $dto->currentStage,
            'applied_at' => $dto->appliedAt,
        ];

        Application::create($data);

        return static::toResponse(
            message: 'Application created'
        );
    }
}