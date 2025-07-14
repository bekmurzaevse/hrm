<?php

namespace App\Actions\v1\KpiRecord;

use App\Dto\v1\KpiRecord\CreateDto;
use App\Models\KpiRecord;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \App\Dto\v1\KpiRecord\CreateDto $dto
     * @return JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'user_id' => $dto->userId,
            'vacancy_id' => $dto->vacancyId,
            'kpi_score' => $dto->kpiScore,
            'calculated_at' => $dto->calculatedAt,
        ];

        KpiRecord::create($data);

        return static::toResponse(
            message: 'Kpi Record created'
        );
    }
}