<?php

namespace App\Dto\v1\TestResult;

use App\Http\Requests\v1\TestResult\CreateRequest;

readonly class CreateDto
{
    public function __construct(
        public int $test_id,
        public int $user_id,
        public float $score,
        public string $taken_at
    ) {}

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\TestResult\CreateRequest $request
     * @return CreateDto
     */
    public static function from(CreateRequest $request): self
    {
        return new self(
            test_id: $request->test_id,
            user_id: $request->user_id,
            score: $request->score,
            taken_at: $request->taken_at
        );
    }
}