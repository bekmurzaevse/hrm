<?php

namespace App\Dto\v1\HrDocument;

use App\Http\Requests\v1\HrDocument\IndexRequest;

readonly class IndexDto
{
    public function __construct(
        public int $userId,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\HrDocument\IndexRequest $request
     * @return IndexDto
     */
    public static function from(IndexRequest $request): self
    {
        return new self(
            userId: $request->get('user_id'),
        );
    }
}
