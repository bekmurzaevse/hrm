<?php

namespace App\Actions\v1\FunnelLog;

use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\FunnelLog\FunnelLogResource;
use App\Models\FunnelLog;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class ShowAction
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
            $key = 'funnel_logs:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());
            $data = Cache::remember($key, now()->addDay(), function () use ($id) {
                return FunnelLog::with(['application', 'movedBy', 'stage'])->findOrFail($id);
            });

            return static::toResponse(
                message: 'Successfully received',
                data: new FunnelLogResource($data)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Funnel Log Not Found', 404);
        }
    }
}