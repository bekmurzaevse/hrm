<?php

namespace App\Actions\v1\RecruitmentFunnelStage;

use App\Dto\v1\RecruitmentFunnelStage\CreateDto;
use App\Models\RecruitmentFunnelStage;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \App\Dto\v1\RecruitmentFunnelStage\CreateDto $dto
     * @return JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'vacancy_id' => $dto->vacancyId,
            'stage_name' => $dto->stageName,
            'order' => $dto->order,
        ];

        RecruitmentFunnelStage::create($data);

        return static::toResponse(
            message: 'Recruitment Funnel Stage created'
        );
    }
}