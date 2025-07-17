<?php

namespace App\Dto\v1\HrDocument;

use App\Http\Requests\v1\HrDocument\DeleteRequest;

readonly class DeleteDto
{
    public function __construct(
        public int $userId,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\HrDocument\DeleteRequest $request
     * @return DeleteDto
     */
    public static function from(DeleteRequest $request): self
    {
        return new self(
            userId: $request->get('user_id'),
        );
    }
}
