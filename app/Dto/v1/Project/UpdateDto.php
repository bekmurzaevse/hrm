<?php

namespace App\Dto\v1\Project;

use App\Http\Requests\v1\Project\UpdateRequest;

readonly class UpdateDto
{
    public function __construct(
        public string $title,
        public ?string $status,
        public ?float $budget,
        public ?string $deadline,
        public int $createdBy,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Project\UpdateRequest $request
     * @return UpdateDto
     */
    public static function from(UpdateRequest $request): self
    {
        return new self(
            title: $request->title,
            status: $request->status,
            budget: $request->budget,
            deadline: $request->deadline,
            createdBy: $request->created_by
        );
    }
}
