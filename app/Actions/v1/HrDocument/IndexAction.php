<?php

namespace App\Actions\v1\HrDocument;

use App\Dto\v1\HrDocument\IndexDto;
use App\Http\Resources\v1\HrDocument\HrDocumentCollection;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class IndexAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \App\Dto\v1\HrDocument\IndexDto $dto
     * @return JsonResponse
     */
    public function __invoke(IndexDto $dto): JsonResponse
    {
        $key = 'hr_documents:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $hrDocuments = Cache::remember($key, now()->addDay(), function () use ($dto) {
            return User::findOrFail($dto->userId)->hrDocuments()->paginate(10);
        });

        return static::toResponse(
            message: 'Successfully received',
            data: new HrDocumentCollection($hrDocuments)
        );
    }
}
