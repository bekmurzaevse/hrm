<?php 

namespace App\Actions\v1\RecruitmentFunnelStage;

use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\RecruitmentFunnelStage\RecruitmentFunnelStageResource;
use App\Models\RecruitmentFunnelStage;
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
            $key = 'recruitment_funnel_stages:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());
            $data = Cache::remember($key, now()->addDay(), function () use ($id) {
                return RecruitmentFunnelStage::with(['vacancy'])->findOrFail($id);
            });

            return static::toResponse(
                message: 'Successfully received',
                data: new RecruitmentFunnelStageResource($data)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Recruitment Funnel Stage Not Found', 404);
        }
    }
}