<?php 

namespace App\Actions\v1\Deals;

use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Deals\DealsResource;
use App\Models\Deals;
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
            $key = 'deals:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());
            $client = Cache::remember($key, now()->addDay(), function () use ($id) {
                return Deals::with(['client'])->findOrFail($id);
            });

            return static::toResponse(
                message: 'Successfully received',
                data: new DealsResource($client)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Deals Not Found', 404);
        }
    }
}