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
        $file = $dto->file;
        $savedPath = FileUploadHelper::file($file, 'reports');

        $data = [
            'title' => $dto->title,
            'type' => $dto->type,
            'generated_by' => $dto->generatedBy,
            'file_path' => $savedPath,
        ];

        Report::create($data);

        return static::toResponse(
            message: 'Report created'
        );
    }
}