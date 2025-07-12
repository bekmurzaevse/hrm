<?php

namespace App\Actions\v1\CourseAssignment;
use App\Dto\v1\CourseAssignment\CreateDto;
use App\Models\CourseAssignment;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \App\Dto\v1\CourseAssignment\CreateDto $dto
     * @return JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'course_id' => $dto->courseId,
            'user_id' => $dto->userId,
            'assigned_at' => $dto->assignedAt,
            'completed_at' => $dto->completedAt,
            'certificate_url' => $dto->certificateUrl,
        ];

        CourseAssignment::create($data);

        return static::toResponse(
            message: 'Kurs tapsirmasi jaratildi'    
        );
    }
}