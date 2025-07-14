<?php

namespace App\Actions\v1\Test;

use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Test\TestResource;
use App\Models\Test;
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
            $key = 'tests:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());
            $test = Cache::remember($key, now()->addDay(), function () use ($id) {
                return Test::with(['course'])->findOrFail($id);
            });

            return static::toResponse(
                message: 'Successfully received',
                data: new TestResource($test)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Test Not Found', 404);
        }
    }
}