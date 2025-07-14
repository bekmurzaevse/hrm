<?php

namespace App\Dto\v1\KpiRecord;

use App\Http\Requests\v1\KpiRecord\UpdateRequest;

readonly class UpdateDto
{
    public function __construct(
        public int $userId,
        public int $vacancyId,
        public float $kpiScore,
        public string $calculatedAt
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\KpiRecord\UpdateRequest $request
     * @return CreateDto
     */
    public static function from(UpdateRequest $request): self
    {
        return new self(
            userId: $request->get('user_id'),
            vacancyId: $request->get('vacancy_id'),
            kpiScore: $request->get('kpi_score'),
            calculatedAt: $request->get('calculated_at')
        );
    }
}
