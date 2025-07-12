<?php

namespace App\Actions\v1\TestResult;

use App\Http\Resources\v1\TestResult\TestResultCollection;
use App\Models\TestResult;
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
        $key = 'test_results:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $results = Cache::remember($key, now()->addDay(), function () {
            return TestResult::with(['test', 'course'])->paginate(10);
        });

        return static::toResponse(
            message: 'Successfully received',
            data: new TestResultCollection($results)
        );
    }
}