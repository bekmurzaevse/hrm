<?php

namespace App\Actions\v1\HrDocument;

use App\Dto\v1\HrDocument\CreateDto;
use App\Helpers\FileUploadHelper;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \App\Dto\v1\HrDocument\CreateDto $dto
     * @return JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $file = $dto->file;
        $path = FileUploadHelper::file($file, 'hr_documents');

        User::firstOrFail()->hrDocuments()->create([
            'name' => $dto->name,
            'path' => $path,
            'type' => 'hr_document',
            'size' => $file->getSize(),
            'description' => $dto->description ?? null,
        ]);

        return static::toResponse(
            message: 'HrDocument created'
        );
    }
}
