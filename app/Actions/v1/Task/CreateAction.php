<?php

namespace App\Actions\v1\Task;

use App\Dto\v1\Task\CreateDto;
use App\Models\Task;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \App\Dto\v1\Task\CreateDto $dto
     * @return JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'assigned_to' => $dto->assignedToId,
            'title' => $dto->title,
            'description' => $dto->description,
            'due_date' => $dto->dueDate,
            'status' => $dto->status,
            'created_by' => $dto->createdById,
        ];

        Task::create($data);

        return static::toResponse(
            message: 'Task created'
        );
    }
}