<?php

namespace App\Dto\v1\Tag;

use App\Http\Requests\v1\Tag\UpdateRequest;

readonly class UpdateDto
{
    public function __construct(
        public string $name,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Tag\UpdateRequest $request
     * @return UpdateDto
     */
    public static function from(UpdateRequest $request): self
    {
        return new self(
            name: $request->name,
        );
    }
}
