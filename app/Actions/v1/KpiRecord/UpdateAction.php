<?php

namespace App\Actions\v1\KpiRecord;

use App\Dto\v1\KpiRecord\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\KpiRecord\KpiRecordResource;
use App\Models\KpiRecord;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\KpiRecord\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $data = KpiRecord::findOrFail($id);
            $data->update([
                'user_id' => $dto->userId,
                'vacancy_id' => $dto->vacancyId,
                'kpi_score' => $dto->kpiScore,
                'calculated_at' => $dto->calculatedAt,
            ]);

            return static::toResponse(
                message: 'Kpi Record Updated',
                data: new KpiRecordResource($data)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Kpi Record Not Found', 404);
        }
    }
}