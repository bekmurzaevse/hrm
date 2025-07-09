<?php

namespace App\Actions\v1\Project;

use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Project\ProjectResource;
use App\Models\Project;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

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
            $key = 'projects:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());
            $project = Cache::remember($key, now()->addDay(), function () use ($id) {
                return Project::with(['createdBy'])->findOrFail($id);
            });

            return static::toResponse(
                message: 'Successfully received',
                data: new ProjectResource($project)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Project Not Found', 404);
        }
    }
}
