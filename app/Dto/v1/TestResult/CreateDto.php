<?php

namespace App\Dto\v1\TestResult;

use App\Http\Requests\v1\TestResult\CreateRequest;

readonly class CreateDto
{
    public function __construct(
        public int $testId,
        public int $userId,
        public float $score,
        public string $takenAt
    ) {}

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\TestResult\CreateRequest $request
     * @return CreateDto
     */
    public static function from(CreateRequest $request): self
    {
        return new self(
            testId: $request->test_id,
            userId: $request->user_id,
            score: $request->score,
            takenAt: $request->taken_at
        );
    }
}