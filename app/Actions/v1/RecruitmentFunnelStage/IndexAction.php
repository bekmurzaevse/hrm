<?php

namespace App\Actions\v1\RecruitmentFunnelStage;

use App\Http\Resources\v1\RecruitmentFunnelStage\RecruitmentFunnelStageCollection;
use App\Models\RecruitmentFunnelStage;
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
        $key = 'recruitment_funnel_stages:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $data = Cache::remember($key, now()->addDay(), function () {
            return RecruitmentFunnelStage::with(['vacancy'])->paginate(10);
        });

        return static::toResponse(
            message: 'Successfully received',
            data: new RecruitmentFunnelStageCollection($data)
        );
    }
}
