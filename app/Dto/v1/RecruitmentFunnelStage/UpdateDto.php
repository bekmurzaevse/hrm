<?php

namespace App\Dto\v1\RecruitmentFunnelStage;

use App\Http\Requests\v1\RecruitmentFunnelStage\UpdateRequest;

readonly class UpdateDto
{
    public function __construct(
        public int $vacancyId,
        public string $stageName,
        public int $order,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\RecruitmentFunnelStage\UpdateRequest $request
     * @return UpdateDto
     */
    public static function from(UpdateRequest $request): self
    {
        return new self(
            vacancyId: $request->get('vacancy_id'),
            stageName: $request->get('stage_name'),
            order: $request->get('order'),
        );
    }
}
