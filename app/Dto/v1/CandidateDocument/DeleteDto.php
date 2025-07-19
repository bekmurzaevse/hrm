<?php

namespace App\Dto\v1\CandidateDocument;

use App\Http\Requests\v1\CandidateDocument\DeleteRequest;

readonly class DeleteDto
{
    public function __construct(
        public int $candidateId,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public static function from(DeleteRequest $request): self
    {
        return new self(
            candidateId: $request->get('candidate_id'),
        );
    }
}