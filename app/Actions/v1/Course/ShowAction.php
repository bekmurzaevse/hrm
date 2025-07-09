<?php

namespace App\Actions\v1\Course;

use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Course\CourseResource;
use App\Models\Course;
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
            $key = 'courses:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());
            $course = Cache::remember($key, now()->addDay(), function () use ($id) {
                return Course::with(['createdBy'])->findOrFail($id);
            });

            return static::toResponse(
                message: 'Successfully received',
                data: new CourseResource($course)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Course Not Found', 404);
        }
    }
}