<?php

namespace App\Dto\v1\Course;

use App\Http\Requests\v1\Course\CreateRequest;

readonly class CreateDto
{
    public function __construct(
        public string $title,
        public ?string $description,
        public int $createdBy,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Course\CreateRequest $request
     * @return CreateDto
     */
    public static function from(CreateRequest $request): self
    {
        return new self(
            title: $request->title,
            description: $request->description,
            createdBy: $request->created_by
        );
    }
}