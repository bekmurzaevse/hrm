<?php

namespace App\Actions\v1\Report;

use App\Http\Resources\v1\Report\ReportCollection;
use App\Models\Report;
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
        $key = 'reports:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $data = Cache::remember($key, now()->addDay(), function () {
            return Report::with(['generatedBy'])->paginate(10);
        });

        return static::toResponse(
            message: 'Successfully received',
            data: new ReportCollection($data)
        );
    }
}
