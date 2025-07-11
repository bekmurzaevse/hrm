<?php

namespace App\Actions\v1\Report;

use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Report\ReportResource;
use App\Models\Report;
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
            $key = 'reports:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());
            $data = Cache::remember($key, now()->addDay(), function () use ($id) {
                return Report::with(['generatedBy'])->findOrFail($id);
            });

            return static::toResponse(
                message: 'Successfully received',
                data: new ReportResource($data)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Report Not Found', 404);
        }
    }
}