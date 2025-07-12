<?php

namespace App\Dto\v1\RecruitmentFunnelStage;

use App\Http\Requests\v1\RecruitmentFunnelStage\CreateRequest;

readonly class CreateDto
{
    public function __construct(
        public int $vacancyId,
        public string $stageName,
        public int $order,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\RecruitmentFunnelStage\CreateRequest $request
     * @return CreateDto
     */
    public static function from(CreateRequest $request): self
    {
        return new self(
            vacancyId: $request->get('vacancy_id'),
            stageName: $request->get('stage_name'),
            order: $request->get('order'),
        );
    }
}
