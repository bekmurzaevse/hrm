<?php

namespace App\Actions\v1\Project;

use App\Dto\v1\Project\CreateDto;
use App\Models\Project;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \App\Dto\v1\Project\CreateDto $dto
     * @return JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'title' => $dto->title,
            'budget' => $dto->budget ?? null,
            'status' => $dto->status ?? 'active',
            'deadline' => $dto->deadline ?? null,
            'created_by' => $dto->createdBy,
        ];

        Project::create($data);

        return static::toResponse(
            message: 'Project created'
        );
    }
}
