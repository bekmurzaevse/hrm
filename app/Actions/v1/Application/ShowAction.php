<?php

namespace App\Actions\v1\Application;

use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Application\ApplicationResource;
use App\Models\Application;
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
            $key = 'applications:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());
            $data = Cache::remember($key, now()->addDay(), function () use ($id) {
                return Application::with(['vacancy', 'candidate', 'currentStage'])->findOrFail($id);
            });

            return static::toResponse(
                message: 'Successfully received',
                data: new ApplicationResource($data)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Application Not Found', 404);
        }
    }
}