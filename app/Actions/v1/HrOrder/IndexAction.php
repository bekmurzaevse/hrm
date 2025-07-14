<?php

namespace App\Actions\v1\HrOrder;

use App\Http\Resources\v1\HrOrder\HrOrderCollection;
use App\Models\User;
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
        $key = 'hr_orders:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $hrOrders = Cache::remember($key, now()->addDay(), function () {
            return User::firstOrFail()->hrOrders()->paginate(10);
        });

        return static::toResponse(
            message: 'Successfully received',
            data: new HrOrderCollection($hrOrders)
        );
    }
}
