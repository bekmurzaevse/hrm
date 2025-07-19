<?php

namespace App\Dto\v1\Client;

use App\Http\Requests\v1\Client\CreateRequest;

readonly class CreateDto
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
     * @param \App\Http\Requests\v1\Client\CreateRequest $request
     * @return CreateDto
     */
    public static function from(CreateRequest $request): self
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
