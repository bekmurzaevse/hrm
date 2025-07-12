<?php

namespace App\Actions\v1\HrDocument;

use App\Exceptions\ApiResponseException;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class DeleteAction
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
            $hrDocument = User::firstOrFail()
                ->hrDocuments()
                ->where('id', $id)
                ->firstOrFail();

            $filePath = $hrDocument->path;

            if (Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }

            $hrDocument->delete();

            return static::toResponse(
                message: 'Hr Document Deleted',
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Hr Document Not Found', 404);
        }
    }
}
