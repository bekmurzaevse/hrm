<?php

namespace App\Dto\v1\Deals;

use App\Http\Requests\v1\Deals\CreateRequest;

readonly class CreateDto
{
    public function __construct(
        public int $clientId,
        public ?string $stage,
        public int $value,
        public ?string $description,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Deals\CreateRequest $request
     * @return CreateDto
     */
    public static function from(CreateRequest $request): self
    {
        return new self(
            clientId: $request->client_id,
            stage: $request->stage,
            value: $request->value,
            description: $request->description
        );
    }
}
