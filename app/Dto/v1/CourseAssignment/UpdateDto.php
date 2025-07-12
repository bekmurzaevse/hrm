<?php

namespace App\Dto\v1\CourseAssignment;

use App\Http\Requests\v1\CourseAssignment\UpdateRequest;

readonly class UpdateDto
{
    public function __construct(
        public int $courseId,
        public int $userId,
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
        );
    }
}