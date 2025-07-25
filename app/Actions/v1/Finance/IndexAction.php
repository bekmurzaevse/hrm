<?php

namespace App\Actions\v1\Finance;

use App\Http\Resources\v1\Finance\FinanceCollection;
use App\Models\Finance;
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
        $key = 'finances:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $data = Cache::remember($key, now()->addDay(), function () {
            return Finance::with(['client', 'vacancy'])->paginate(10);
        });

        return static::toResponse(
            message: 'Successfully received',
            data: new FinanceCollection($data)
        );
    }
}
