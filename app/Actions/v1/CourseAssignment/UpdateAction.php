<?php

namespace App\Actions\v1\CourseAssignment;

use App\Dto\v1\CourseAssignment\UpdateDto;
use Illuminate\Http\JsonResponse;
use App\Models\CourseAssignment;
use App\Http\Resources\v1\CourseAssignment\CourseAssignmentResource;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Exceptions\ApiResponseException;
use function Symfony\Component\Clock\now;

class UpdateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\CourseAssignment\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $assignment = CourseAssignment::with(['course', 'user'])->findOrFail($id);

            $assignment->update([
                'course_id'       => $dto->courseId,
                'user_id'         => $dto->userId,
            ]);

            return static::toResponse(
                message: 'Course Assignment Updated',
                data: new CourseAssignmentResource($assignment)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('CourseAssignment Not Found', 404);
        }
    }
}