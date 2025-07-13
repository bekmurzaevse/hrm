<?php

namespace App\Actions\v1\TestResult;

use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\TestResult\TestResultResource;
use App\Models\TestResult;
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        try {
            $key = 'test_results:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());
            $results = Cache::remember($key, now()->addDay(), function () use ($id) {
                return TestResult::with(['test', 'course'])->findOrFail($id);
            });

            return static::toResponse(
                message: 'Successfully received',
                data: new TestResultResource($results)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Test Result Not Found', 404);
        }
    }
}