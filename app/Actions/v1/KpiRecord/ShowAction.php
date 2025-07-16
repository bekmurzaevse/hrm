<?php

namespace App\Actions\v1\KpiRecord;

use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\KpiRecord\KpiRecordResource;
use App\Models\KpiRecord;
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
            $key = 'kpi_records:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());
            $data = Cache::remember($key, now()->addDay(), function () use ($id) {
                return KpiRecord::with(['vacancy', 'user'])->findOrFail($id);
            });

            return static::toResponse(
                message: 'Successfully received',
                data: new KpiRecordResource($data)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Kpi Record Not Found', 404);
        }
    }
}