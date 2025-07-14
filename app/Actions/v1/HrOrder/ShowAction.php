<?php

namespace App\Actions\v1\HrOrder;

use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\HrOrder\HrOrderResource;
use App\Models\User;
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
            $key = 'hr_orders:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());
            $hrOrders = Cache::remember($key, now()->addDay(), function () use ($id) {
                return User::firstOrFail()->hrOrders()->where('id', $id)->firstOrFail();
            });

            return static::toResponse(
                message: 'Successfully received',
                data: new HrOrderResource($hrOrders)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('HrOrder Not Found', 404);
        }
    }
}
