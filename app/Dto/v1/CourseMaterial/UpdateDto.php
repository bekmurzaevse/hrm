<?php

namespace App\Dto\v1\CourseMaterial;

use App\Http\Requests\v1\CourseMaterial\UpdateRequest;
use Illuminate\Http\UploadedFile;

readonly class UpdateDto
{
    public function __construct(
        public ?string $name,
        public ?string $description,
        public int $courseId,
        public UploadedFile $file
    ) {}

    public static function from(UpdateRequest $request): self
    {
        return new self(
            name: $request->get('name'),
            description: $request->get('description'),
            courseId: $request->get('course_id'),
            file: $request->file('file')
        );
    }
}