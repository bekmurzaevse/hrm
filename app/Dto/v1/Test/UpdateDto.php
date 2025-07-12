<?php

namespace App\Dto\v1\Test;

use App\Http\Requests\v1\Test\UpdateRequest;

readonly class UpdateDto
{
    public function __construct(
        public ?string $title = null,
        public int $courseId,
    ) {}

    /**
     * Convert the DTO to an array.
     */
    public static function from(UpdateRequest $request): self
    {
        return new self(
            title: $request->title,
            courseId: $request->course_id,
        );
    }
}