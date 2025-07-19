<?php

namespace App\Actions\v1\Tag;

use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Tag\TagResource;
use App\Models\Tag;
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
            $key = 'tags:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());
            $tag = Cache::remember($key, now()->addDay(), function () use ($id) {
                return Tag::findOrFail($id);
            });

            return static::toResponse(
                message: 'Successfully received',
                data: new TagResource($tag)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Tag Not Found', 404);
        }
    }
}
