<?php

namespace App\Actions\v1\CourseMaterial;

use App\Dto\v1\CourseMaterial\IndexDto;
use App\Http\Resources\v1\CourseMaterial\CourseMaterialCollection;
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
    public function __invoke(IndexDto $dto): JsonResponse
    {
        $key = 'course_materials:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $materials = Cache::remember($key, now()->addDay(), function () use ($dto) {
            return Course::findOrFail($dto->courseId)->materials()->paginate(10);
        });

        return static::toResponse(
            message: 'Kurs materiallari.',
            data: new CourseMaterialCollection($materials)
        );
    }
}