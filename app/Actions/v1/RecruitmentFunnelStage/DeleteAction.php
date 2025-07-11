<?php

namespace App\Actions\v1\RecruitmentFunnelStage;

use App\Exceptions\ApiResponseException;
use App\Models\RecruitmentFunnelStage;
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
            $data = RecruitmentFunnelStage::findOrFail($id);
            $data->delete();

            return static::toResponse(
                message: 'Recruitment Funnel Stage Deleted',
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Recruitment Funnel Stage Not Found', 404);
        }
    }
}