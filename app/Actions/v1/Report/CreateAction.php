<?php

namespace App\Actions\v1\Report;

use App\Dto\v1\Report\CreateDto;
use App\Models\Report;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

        $originalFilename = $file->getClientOriginalName();
        $fileName = pathinfo($originalFilename, PATHINFO_FILENAME);
        $fileName = $fileName . '_' . Str::random(10) . '_' . now()->format('Y-m-d-H:i:s') . '.' . $file->extension();

        $savedPath = Storage::disk('public')->putFileAs('reports', $file, $fileName);

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