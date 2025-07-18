<?php

namespace App\Dto\v1\CourseMaterial;

use App\Http\Requests\v1\CourseMaterial\DeleteRequest;

readonly class DeleteDto
{
    public function __construct(
        public int $courseId,
    ) {}

    /**
     * @return array<string, mixed>
     */
    public static function from(DeleteRequest $request): self
    {
        return new self(
            courseId: $request->get('course_id'),
        );
    }
}