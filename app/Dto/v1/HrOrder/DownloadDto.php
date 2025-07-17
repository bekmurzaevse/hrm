<?php

namespace App\Dto\v1\HrOrder;

use App\Http\Requests\v1\HrOrder\DownloadRequest;

readonly class DownloadDto
{
    public function __construct(
        public int $userId,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\HrOrder\DownloadRequest $request
     * @return DownloadDto
     */
    public static function from(DownloadRequest $request): self
    {
        return new self(
            userId: $request->get('user_id'),
        );
    }
}
