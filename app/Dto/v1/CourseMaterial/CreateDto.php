<?php

namespace App\Dto\v1\CourseMaterial;

use App\Http\Requests\v1\CourseMaterial\CreateRequest;


readonly class CreateDto
{
    public function __construct(
        public int $courseId,
        public string $fileUrl,
        public string $type,
        public string $uploadedAt = 'now(3)',
    ) {
    }

    public static function from(CreateRequest $request): self
    {
        return new self(
            courseId: $request->course_id,
            fileUrl: $request->file_url,
            type: $request->type,
            uploadedAt: $request->uploaded_at,
        );
    }
}