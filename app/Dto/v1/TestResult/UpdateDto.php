<?php

namespace App\Dto\v1\TestResult;

use App\Http\Requests\v1\TestResult\UpdateRequest;

readonly class UpdateDto
{
    public function __construct(
        public ?int $testId,
        public ?int $userId,
        public float $score,
    ) {}

    /**
     * Convert the DTO to an array.
     */
    public static function from(UpdateRequest $request): self
    {
        return new self(
            testId: $request->test_id,
            userId: $request->user_id,
            score: $request->score,
        );
    }
}    