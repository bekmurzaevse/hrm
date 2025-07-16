<?php

namespace App\Actions\v1\Report;

use App\Dto\v1\Report\CreateDto;
use App\Helpers\FileUploadHelper;
use App\Models\Report;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \App\Dto\v1\Report\CreateDto $dto
     * @return JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'title' => $dto->title,
            'type' => $dto->type,
            'generated_by' => $dto->generatedBy,
        ];

        $item = Report::create($data);

        $file = $dto->file;
        $savedPath = FileUploadHelper::file($file, 'reports/' . $item->id);

        $item->file()->create([
            'name' => $file->getClientOriginalName(),
            'path' => $savedPath,
            'type' => $file->getClientMimeType(),
            'size' => $file->getSize(),
            'fileable_type' => Report::class,
            'fileable_id' => $item->id,
            'description' => $dto->description,
        ]);

        return static::toResponse(
            message: 'Report created'
        );
    }
}