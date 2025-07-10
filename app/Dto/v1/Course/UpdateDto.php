<?php

namespace App\Dto\v1\Course;

use App\Http\Requests\v1\Course\UpdateRequest;


readonly class UpdateDto
{
    public function __construct(
        public string $title,
        public ?string $description,
        public int $createdBy,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Course\UpdateRequest $request
     * @return UpdateDto
     */
    public static function from(UpdateRequest $request): self
    {
        return new self(
            title: $request->title,
            description: $request->description,
            createdBy: $request->created_by
        );
    }
}