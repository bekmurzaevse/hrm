<?php

namespace App\Actions\v1\Course;

use App\Exceptions\ApiResponseException;
use App\Models\Course;
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
            $course = Course::findOrFail($id);
            $course->delete();

            return static::toResponse(
                message: 'Course Deleted',
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Course Not Found', 404);
        }
    }
}