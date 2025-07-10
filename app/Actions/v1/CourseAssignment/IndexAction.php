<?php

namespace App\Actions\v1\CourseAssignment;

use App\Http\Resources\v1\CourseAssignment\CourseAssignmentCollection;
use App\Models\CourseAssignment;
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
        $key = 'course_assignments:' . app()->getLocale() . ':' . md5(request()->fullUrl());

        $assignments = Cache::remember($key, now()->addDay(), function () {
            return CourseAssignment::with(['course', 'user'])->paginate(10);
        });

        return static::toResponse(
            message: 'Kurs tapsirmalari.',
            data: new CourseAssignmentCollection($assignments)
        );
    }
}