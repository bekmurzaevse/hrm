<?php

namespace App\Actions\v1\Task;

use App\Exceptions\ApiResponseException;
use App\Models\Task;
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
            $data = Task::findOrFail($id);
            $data->delete();

            return static::toResponse(
                message: 'Task Deleted',
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Task Not Found', 404);
        }
    }
}