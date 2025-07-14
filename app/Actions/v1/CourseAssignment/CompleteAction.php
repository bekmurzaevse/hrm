<?php

namespace App\Actions\v1\CourseAssignment;

use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\CourseAssignment\CourseAssignmentResource;
use App\Models\CourseAssignment;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class CompleteAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $courseAssignmentId
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        try {
            $assignment = CourseAssignment::findOrFail($id);

            $assignment->update([
                'completed_at' => now(),
                'certificate_url' => $assignment->certificate_url ?? 'https://example.com/certificate.pdf'
            ]);

            return static::toResponse(
                message: 'Kurs tapsirmasi orinlandi',
                data: new CourseAssignmentResource($assignment)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Assignment not found', 404);
        }
    }
}