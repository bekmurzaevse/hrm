<?php

namespace App\Dto\v1\CourseMaterial;

use App\Http\Requests\v1\CourseMaterial\IndexRequest;

readonly class IndexDto
{
    public function __construct(
        public ?int $courseId,
    ) {}

    public static function from(IndexRequest $request): self
    {
        return new self(
            courseId: $request->get('course_id'),
        );
    }
}