<?php

namespace App\Actions\v1\Application;

use App\Http\Resources\v1\Application\ApplicationCollection;
use App\Models\Application;
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
        $key = 'applications:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $data = Cache::remember($key, now()->addDay(), function () {
            return Application::with(['vacancy', 'candidate', 'currentStage'])->paginate(10);
        });

        return static::toResponse(
            message: 'Successfully received',
            data: new ApplicationCollection($data)
        );
    }
}
