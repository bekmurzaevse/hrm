<?php

namespace App\Actions\v1\CourseAssignment;

use App\Models\CourseAssignment;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Exceptions\ApiResponseException;

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
            $assignment = CourseAssignment::findOrFail($id);
            $assignment->delete();

            return static::toResponse(
                message: 'Assignment Deleted',
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Assignment Not Found', 404);
        }
    }
}