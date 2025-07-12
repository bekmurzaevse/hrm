<?php

namespace App\Actions\v1\Test;

use App\Http\Resources\v1\Test\TestCollection;
use App\Models\Test;
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
        $key = 'tests:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $tests = Cache::remember($key, now()->addDay(), function () {
            return Test::with(['course'])->paginate(10);
        });

        return static::toResponse(
            message: 'Successfully received',
            data: new TestCollection($tests)
        );
    }
}