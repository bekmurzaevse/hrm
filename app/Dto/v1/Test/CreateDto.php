<?php

namespace App\Dto\v1\Test;

use App\Http\Requests\v1\Test\CreateRequest;

readonly class CreateDto
{
    public function __construct(
        public string $title,
        public int $courseId,
    ) {}

    /**
     * Convert the DTO to an array.
     */
    public static function from(CreateRequest $request): self
    {
        return new self(
            title: $request->title,
            courseId: $request->course_id,
        );
    }
}