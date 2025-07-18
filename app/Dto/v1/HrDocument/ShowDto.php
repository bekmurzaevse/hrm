<?php

namespace App\Dto\v1\HrDocument;

use App\Http\Requests\v1\HrDocument\ShowRequest;

readonly class ShowDto
{
    public function __construct(
        public int $userId,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\HrDocument\ShowRequest $request
     * @return ShowDto
     */
    public static function from(ShowRequest $request): self
    {
        return new self(
            userId: $request->get('user_id'),
        );
    }
}
