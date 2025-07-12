<?php

namespace App\Actions\v1\HrDocument;

use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\HrDocument\HrDocumentResource;
use App\Models\User;
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
            $key = 'hr_documents:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());
            $hrDocument = Cache::remember($key, now()->addDay(), function () use ($id) {
                return User::firstOrFail()->hrDocuments()->where('id', $id)->firstOrFail();
            });

            return static::toResponse(
                message: 'Successfully received',
                data: new HrDocumentResource($hrDocument)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('HrDocument Not Found', 404);
        }
    }
}
