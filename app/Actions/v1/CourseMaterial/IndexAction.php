<?php

namespace App\Actions\v1\CourseMaterial;

use App\Http\Resources\v1\CourseMaterial\CourseMaterialCollection;
use App\Models\CourseMaterial;
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
        $key = 'course_materials:' . app()->getLocale() . ':' . md5(request()->fullUrl());

        $materials = Cache::remember($key, now()->addDay(), function () {
            return CourseMaterial::with(['course'])->paginate(10);
        });

        return static::toResponse(
            message: 'Kurs materiallari.',
            data: new CourseMaterialCollection($materials)
        );
    }
}