<?php

namespace App\Actions\v1\RecruitmentFunnelStage;

use App\Dto\v1\RecruitmentFunnelStage\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\RecruitmentFunnelStage\RecruitmentFunnelStageResource;
use App\Models\RecruitmentFunnelStage;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\RecruitmentFunnelStage\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $data = RecruitmentFunnelStage::findOrFail($id);
            $data->update([
                'vacancy_id' => $dto->vacancyId,
                'stage_name' => $dto->stageName,
                'order' => $dto->order,
            ]);

            return static::toResponse(
                message: 'Recruitment Funnel Stage Updated',
                data: new RecruitmentFunnelStageResource($data)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Recruitment Funnel Stage Not Found', 404);
        }
    }
}