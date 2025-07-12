<?php

namespace App\Dto\v1\CourseAssignment;

use App\Http\Requests\v1\CourseAssignment\UpdateRequest;

readonly class UpdateDto
{
    public function __construct(
        public int $courseId,
        public int $userId,
        public ?string $assignedAt = null,
        public ?string $completedAt = null,
        public ?string $certificateUrl = null,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\CourseAssignment\UpdateRequest $request
     * @return UpdateDto
     */
    public static function from(UpdateRequest $request): self
    {
        return new self(
            courseId: $request->course_id,
            userId: $request->user_id,
            assignedAt: $request->assigned_at,
            completedAt: $request->completed_at,
            certificateUrl: $request->certificate_url
        );
    }
}