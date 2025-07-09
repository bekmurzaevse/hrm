<?php

namespace App\Actions\v1\Vacancy;

use App\Dto\v1\Vacancy\CreateDto;
use App\Models\Vacancy;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \App\Dto\v1\Vacancy\CreateDto $dto
     * @return JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'title' => $dto->title,
            'requirements' => $dto->requirements,
            'salary' => $dto->salary ?? null,
            'deadline' => $dto->deadline ?? null,
            'recruiter_id' => $dto->recruiterId,
            'project_id' => $dto->projectId ?? null,
            'status' => $dto->status ?? 'open',
            'description' => $dto->description ?? null,
        ];

        Vacancy::create($data);

        return static::toResponse(
            message: 'Vacancy created'
        );
    }
}
