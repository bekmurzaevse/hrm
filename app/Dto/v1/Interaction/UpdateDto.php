<?php

namespace App\Dto\v1\Interaction;

use App\Http\Requests\v1\Interaction\UpdateRequest;

readonly class UpdateDto
{
    public function __construct(
        public int $clientId,
        public string $type,
        public string $notes,
        public int $userId,
        public ?string $description,
    ) {
    }

    public static function from(UpdateRequest $request): self
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
