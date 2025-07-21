<?php

namespace App\Dto\v1\Client;

use App\Http\Requests\v1\Client\UpdateRequest;

readonly class UpdateDto
{
    public function __construct(
        public string $name,
        public string $contactInfo,
        public ?string $status,
        public int $createdBy,
        public ?array $tags,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Client\UpdateRequest $request
     * @return UpdateDto
     */
    public static function from(UpdateRequest $request): self
    {
        return new self(
            name: $request->name,
            contactInfo: $request->contact_info,
            status: $request->status,
            createdBy: $request->created_by,
            tags: $request->tags
        );
    }
}
