<?php 

namespace App\Actions\v1\Deals;

use App\Http\Resources\v1\Deals\DealsCollection;
use App\Models\Deals;
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
        $key = 'deals:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $deals = Cache::remember($key, now()->addDay(), function () {
            return Deals::with(['client'])->paginate(10);
        });

        return static::toResponse(
            message: 'Successfully received',
            data: new DealsCollection($deals)
        );
    }
}