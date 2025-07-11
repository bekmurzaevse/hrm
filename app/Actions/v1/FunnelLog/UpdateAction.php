<?php

namespace App\Actions\v1\FunnelLog;

use App\Dto\v1\FunnelLog\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\FunnelLog\FunnelLogResource;
use App\Models\FunnelLog;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\FunnelLog\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $data = FunnelLog::findOrFail($id);
            $data->update([
                'application_id' => $dto->applicationId,
                'stage_id' => $dto->stageId,
                'moved_by' => $dto->movedBy,
                'moved_at' => now(),
            ]);

            return static::toResponse(
                message: 'Funnel Log Updated',
                data: new FunnelLogResource($data)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Funnel Log Not Found', 404);
        }
    }
}