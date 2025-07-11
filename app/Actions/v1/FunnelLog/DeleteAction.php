<?php

namespace App\Actions\v1\FunnelLog;

use App\Exceptions\ApiResponseException;
use App\Models\FunnelLog;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class DeleteAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        try {
            $data = FunnelLog::findOrFail($id);
            $data->delete();

            return static::toResponse(
                message: 'Funnel Log Deleted',
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Funnel Log Not Found', 404);
        }
    }
}