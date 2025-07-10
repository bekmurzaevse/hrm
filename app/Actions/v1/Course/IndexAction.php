<?php

namespace App\Actions\v1\Course;

use App\Http\Resources\v1\Course\CourseCollection;
use App\Models\Course;
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
        $key = 'courses:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $courses = Cache::remember($key, now()->addDay(), function () {
            return Course::with(['createdBy'])->paginate(10);
        });

        return static::toResponse(
            message: 'Successfully received',
            data: new CourseCollection($courses)
        );
    }
}