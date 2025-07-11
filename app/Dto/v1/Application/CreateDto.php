<?php

namespace App\Dto\v1\Application;

use App\Http\Requests\v1\Application\CreateRequest;

readonly class CreateDto
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
     * @param \App\Http\Requests\v1\Application\CreateRequest $request
     * @return CreateDto
     */
    public static function from(CreateRequest $request): self
    {
        return new self(
            candidateId: $request->get('candidate_id'),
            vacancyId: $request->get('vacancy_id'),
            currentStage: $request->get('current_stage'),
            appliedAt: $request->get('applied_at')
        );
    }
}
