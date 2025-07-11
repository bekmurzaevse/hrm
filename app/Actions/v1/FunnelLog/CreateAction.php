<?php

namespace App\Actions\v1\FunnelLog;

use App\Dto\v1\FunnelLog\CreateDto;
use App\Models\FunnelLog;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \App\Dto\v1\FunnelLog\CreateDto $dto
     * @return JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'application_id' => $dto->applicationId,
            'stage_id' => $dto->stageId,
            'moved_by' => $dto->movedBy,
            'moved_at' => now(),
        ];

        FunnelLog::create($data);

        return static::toResponse(
            message: 'Funnel Log created'
        );
    }
}