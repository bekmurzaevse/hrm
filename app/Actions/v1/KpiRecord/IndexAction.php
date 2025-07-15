<?php

namespace App\Actions\v1\KpiRecord;

use App\Http\Resources\v1\KpiRecord\KpiRecordCollection;
use App\Models\KpiRecord;
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
        $key = 'kpi_records:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $data = Cache::remember($key, now()->addDay(), function () {
            return KpiRecord::with(['user', 'vacancy'])->paginate(10);
        });

        return static::toResponse(
            message: 'Successfully received',
            data: new KpiRecordCollection($data)
        );
    }
}
