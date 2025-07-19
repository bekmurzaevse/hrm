<?php

namespace App\Actions\v1\Report;

use App\Dto\v1\Report\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Helpers\FileUploadHelper;
use App\Http\Resources\v1\Report\ReportResource;
use App\Models\Report;
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
     * @param \App\Dto\v1\Report\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $data = Report::with('file')->findOrFail($id);

            if (Storage::disk('public')->exists($data->file->path)) {
                Storage::disk('public')->delete($data->file->path);
                $data->file()->delete();
            }

            $data->update([
                'title' => $dto->title,
                'type' => $dto->type,
                'generated_by' => $dto->generatedBy,
            ]);

            $file = $dto->file;
            $savedPath = FileUploadHelper::file($file, 'reports/' . $id);

            $data->file()->create([
                'name' => $file->getClientOriginalName(),
                'path' => $savedPath,
                'type' => $file->getClientMimeType(),
                'size' => $file->getSize(),
                'description' => $dto->description,
            ]);
            $data->load('file');

            return static::toResponse(
                message: 'Report Updated',
                data: new ReportResource($data)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Report Not Found', 404);
        }
    }
}