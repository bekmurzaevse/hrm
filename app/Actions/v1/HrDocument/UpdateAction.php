<?php

namespace App\Actions\v1\HrDocument;

use App\Dto\v1\HrDocument\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Helpers\FileUploadHelper;
use App\Http\Resources\v1\HrDocument\HrDocumentResource;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class UpdateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\HrDocument\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $hrDocument = User::firstOrFail()->hrDocuments()->where('id', $id)->firstOrFail();

            $file = $dto->file;
            $filePath = $hrDocument->path;

            if (Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }

            $path = FileUploadHelper::file($file, 'hr_documents');

            User::firstOrFail()->hrDocuments()->where('id', $id)->update([
                    'name' => $dto->name,
                    'path' => $path,
                    'type' => 'hr_document',
                    'size' => $file->getSize(),
                    'description' => $dto->description ?? null,
                ]);

            return static::toResponse(
                message: 'HrDocument Updated',
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('HrDocument Not Found', 404);
        }
    }
}
