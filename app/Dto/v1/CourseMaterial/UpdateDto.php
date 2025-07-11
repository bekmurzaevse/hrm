<?php

namespace App\Dto\v1\CourseMaterial;

use App\Http\Requests\v1\CourseMaterial\UpdateRequest;

readonly class UpdateDto
{
    public function __construct(
        public int $course_id,
        public ?string $file_url = null,
        public ?string $type = null,
        public ?string $uploaded_at = null,
    ) {
    }

    public static function from(UpdateRequest $request): self
    {
        return new self(
            course_id: $request->course_id,
            file_url: $request->file_url,
            type: $request->type,
            uploaded_at: $request->uploaded_at,
        );
    }
}