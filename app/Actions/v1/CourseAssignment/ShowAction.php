<?php

namespace App\Actions\v1\CourseAssignment;

use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\CourseAssignment\CourseAssignmentResource;
use App\Models\CourseAssignment;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
            $key = 'course_assignments:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());

            $assignment = Cache::remember($key, now()->addDay(), function () use ($id) {
                return CourseAssignment::with(['course', 'user'])->findOrFail($id);
            });

            return static::toResponse(
                message: 'Successfully retrieved course assignment.',
                data: new CourseAssignmentResource($assignment)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('CourseAssignment not found', 404);
        }
    }
}