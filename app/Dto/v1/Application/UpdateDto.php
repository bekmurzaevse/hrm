<?php

namespace App\Dto\v1\Application;

use App\Http\Requests\v1\Application\UpdateRequest;

readonly class UpdateDto
{
    public function __construct(
        public int $candidateId,
        public int $vacancyId,
        public int $currentStage,
        public string $appliedAt
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Application\UpdateRequest $request
     * @return UpdateDto
     */
    public static function from(UpdateRequest $request): self
    {
        return new self(
            candidateId: $request->get('candidate_id'),
            vacancyId: $request->get('vacancy_id'),
            currentStage: $request->get('current_stage'),
            appliedAt: $request->get('applied_at')
        );
    }
}
