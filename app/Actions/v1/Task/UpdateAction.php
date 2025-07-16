<?php

namespace App\Actions\v1\Task;

use App\Dto\v1\Task\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Task\TaskResource;
use App\Models\Task;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\Task\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $data = Task::findOrFail($id);
            $data->update([
                'assigned_to' => $dto->assignedToId,
                'title' => $dto->title,
                'description' => $dto->description,
                'due_date' => $dto->dueDate,
                'status' => $dto->status,
                'created_by' => $dto->createdById,
            ]);

            return static::toResponse(
                message: 'Task Updated',
                data: new TaskResource($data)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Task Not Found', 404);
        }
    }
}