<?php

namespace App\Dto\v1\HrOrder;

use App\Http\Requests\v1\HrOrder\ShowRequest;

readonly class ShowDto
{
    public function __construct(
        public int $userId,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\HrOrder\ShowRequest $request
     * @return ShowDto
     */
    public static function from(ShowRequest $request): self
    {
        return new self(
            userId: $request->get('user_id'),
        );
    }
}
