<?php

namespace App\Dto\v1\CourseAssignment;

use App\Http\Requests\v1\CourseAssignment\CreateRequest;

readonly class CreateDto
{
    public function __construct(
        public int $courseId,
        public int $userId,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\CourseAssignment\CreateRequest $request
     * @return CreateDto
     */
    public static function from(CreateRequest $request): self
    {
        return new self(
            courseId: $request->course_id,
            userId: $request->user_id,
        );
    }
}