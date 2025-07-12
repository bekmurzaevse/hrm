<?php

namespace App\Dto\v1\FunnelLog;

use App\Http\Requests\v1\FunnelLog\CreateRequest;

readonly class CreateDto
{
    public function __construct(
        public int $applicationId,
        public int $stageId,
        public int $movedBy,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\FunnelLog\CreateRequest $request
     * @return CreateDto
     */
    public static function from(CreateRequest $request): self
    {
        return new self(
            applicationId: $request->get('application_id'),
            stageId: $request->get('stage_id'),
            movedBy: $request->get('moved_by'),
        );
    }
}
