<?php

namespace App\Dto\v1\CourseMaterial;

use App\Http\Requests\v1\CourseMaterial\ShowRequest;


readonly class ShowDto
{
    public function __construct(
        public int $courseId,
    ) {}

    /**
     * @return array<string, mixed>
     */
    public static function from(ShowRequest $request): self
    {
        return new self(
            courseId: $request->get('course_id'),
        );
    }
}