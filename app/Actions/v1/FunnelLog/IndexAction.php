<?php

namespace App\Actions\v1\FunnelLog;

use App\Http\Resources\v1\FunnelLog\FunnelLogCollection;
use App\Models\FunnelLog;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class IndexAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $key = 'funnel_logs:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $data = Cache::remember($key, now()->addDay(), function () {
            return FunnelLog::with(['application', 'movedBy', 'stage'])->paginate(10);
        });

        return static::toResponse(
            message: 'Successfully received',
            data: new FunnelLogCollection($data)
        );
    }
}
