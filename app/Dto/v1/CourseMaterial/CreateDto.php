<?php

namespace App\Dto\v1\CourseMaterial;

use App\Http\Requests\v1\CourseMaterial\CreateRequest;


readonly class CreateDto
{
    public function __construct(
        public int $course_id,
        public string $file_url,
        public string $type,
        public ?string $uploaded_at = null,
    ) {
    }

    public static function from(CreateRequest $request): self
    {
        return new self(
            course_id: $request->course_id,
            file_url: $request->file_url,
            type: $request->type,
            uploaded_at: $request->uploaded_at,
        );
    }
}