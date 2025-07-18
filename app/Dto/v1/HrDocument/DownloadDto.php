<?php

namespace App\Dto\v1\HrDocument;

use App\Http\Requests\v1\HrDocument\DownloadRequest;

readonly class DownloadDto
{
    public function __construct(
        public int $userId,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\HrDocument\DownloadRequest $request
     * @return DownloadDto
     */
    public static function from(DownloadRequest $request): self
    {
        return new self(
            userId: $request->get('user_id'),
        );
    }
}
