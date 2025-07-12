<?php

namespace App\Dto\v1\CourseMaterial;

use App\Http\Requests\v1\CourseMaterial\UpdateRequest;

readonly class UpdateDto
{
    public function __construct(
        public int $courseId,
        public ?string $fileUrl = null,
        public ?string $type = null,
        public ?string $uploadedAt = null,
    ) {
    }

    public static function from(UpdateRequest $request): self
    {
        return new self(
            courseId: $request->course_id,
            fileUrl: $request->file_url,
            type: $request->type,
            uploadedAt: $request->uploaded_at,
        );
    }
}