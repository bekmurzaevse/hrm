<?php

namespace App\Dto\v1\Deals;

use App\Http\Requests\v1\Deals\UpdateRequest;

readonly class UpdateDto
{
    public function __construct(
        public int $clientId,
        public ?string $stage,
        public float $value,
        public ?string $description,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Deals\UpdateRequest $request
     * @return UpdateDto
     */
    public static function from(UpdateRequest $request): self
    {
        return new self(
            clientId: $request->client_id,
            stage: $request->stage,
            value: $request->value,
            description: $request->description
        );
    }
}
