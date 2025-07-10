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
            'course_id' => $dto->course_id,
            'user_id' => $dto->user_id,
            'assigned_at' => $dto->assigned_at,
            'completed_at' => $dto->completed_at,
            'certificate_url' => $dto->certificate_url,
        ];

        CourseAssignment::create($data);

        return static::toResponse(
            message: 'Kurs tapsirmasi jaratildi'    
        );
    }
}