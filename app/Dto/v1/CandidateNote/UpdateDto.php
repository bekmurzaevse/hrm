<?php

namespace App\Dto\v1\CandidateNote;

use App\Http\Requests\v1\CandidateNote\UpdateRequest;

readonly class UpdateDto
{
    public function __construct(
        public int $candidateId,
        public int $userId,
        public ?string $note,
    ) {}

    public static function from(UpdateRequest $request): self
    {
        return new self(
            candidateId: $request->candidate_id,
            userId: $request->user_id,
            note: $request->note,
        );
    }
}