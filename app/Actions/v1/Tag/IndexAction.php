<?php

namespace App\Actions\v1\Tag;

use App\Http\Resources\v1\Tag\TagCollection;
use App\Models\Tag;
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
        $key = 'tags:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $tags = Cache::remember($key, now()->addDay(), function () {
            return Tag::paginate(10);
        });

        return static::toResponse(
            message: 'Successfully received',
            data: new TagCollection($tags)
        );
    }
}
