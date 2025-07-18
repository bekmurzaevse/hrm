<?php

namespace App\Actions\v1\HrDocument;

use App\Dto\v1\HrDocument\DeleteDto;
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
     * @param \App\Dto\v1\HrDocument\DeleteDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, DeleteDto $dto): JsonResponse
    {
        try {
            $hrDocument = User::findOrFail($dto->userId)
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
