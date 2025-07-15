<?php

namespace App\Actions\v1\Task;

use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Task\TaskResource;
use App\Models\Task;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class ShowAction
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
            $key = 'tasks:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());
            $data = Cache::remember($key, now()->addDay(), function () use ($id) {
                return Task::with(['assignedTo', 'createdBy'])->findOrFail($id);
            });

            return static::toResponse(
                message: 'Successfully received',
                data: new TaskResource($data)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Task Not Found', 404);
        }
    }
}