<?php

namespace App\Actions\v1\CourseAssignment;

use App\Dto\v1\CourseAssignment\UpdateDto;
use Illuminate\Http\JsonResponse;
use App\Models\CourseAssignment;
use App\Http\Resources\v1\CourseAssignment\CourseAssignmentResource;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Exceptions\ApiResponseException;

class UpdateAction
{
    use ResponseTrait;

    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $assignment = CourseAssignment::with(['course', 'user'])->findOrFail($id);

            $assignment->update([
                'course_id'       => $dto->course_id ?? $assignment->course_id,
                'user_id'         => $dto->user_id ?? $assignment->user_id,
                'assigned_at'     => $dto->assigned_at ?? $assignment->assigned_at,
                'completed_at'    => $dto->completed_at ?? $assignment->completed_at,
                'certificate_url' => $dto->certificate_url ?? $assignment->certificate_url,
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