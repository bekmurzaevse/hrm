<?php

namespace App\Dto\v1\Interaction;

use App\Http\Requests\v1\Interaction\CreateRequest;

readonly class CreateDto
{
    public function __construct(
        public int $clientId,
        public string $type,
        public string $notes,
        public int $userId,
        public ?string $description,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Interaction\CreateRequest $request
     * @return CreateDto
     */
    public static function from(CreateRequest $request): self
    {
        return new self(
            clientId: $request->client_id,
            type: $request->type,
            notes: $request->notes,
            userId: $request->user_id,
            description: $request->description
        );
    }
}
