<?php

namespace App\Dto\v1\Tag;

use App\Http\Requests\v1\Tag\CreateRequest;

readonly class CreateDto
{
    public function __construct(
        public string $name,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Tag\CreateRequest $request
     * @return CreateDto
     */
    public static function from(CreateRequest $request): self
    {
        return new self(
            name: $request->name,
        );
    }
}
