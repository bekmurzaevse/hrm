<?php

namespace App\Dto\v1\CourseAssignment;

use App\Http\Requests\v1\CourseAssignment\UpdateRequest;

readonly class UpdateDto
{
    public function __construct(
        public int $course_id,
        public int $user_id,
        public ?string $assigned_at = null,
        public ?string $completed_at = null,
        public ?string $certificate_url = null,
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
            course_id: $request->course_id,
            user_id: $request->user_id,
            assigned_at: $request->assigned_at,
            completed_at: $request->completed_at,
            certificate_url: $request->certificate_url
        );
    }
}