<?php

namespace App\Actions\v1\Report;

use App\Dto\v1\Report\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Report\ReportResource;
use App\Models\Report;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
            $data = Report::findOrFail($id);

            $file = $dto->file;
            if ($file) {
                if (Storage::disk('public')->exists($data->file_path)) {
                    Storage::disk('public')->delete($data->file_path);
                }

                $originalFilename = $file->getClientOriginalName();
                $fileName = pathinfo($originalFilename, PATHINFO_FILENAME);
                $fileName = $fileName . '_' . Str::random(10) . '_' . now()->format('Y-m-d-H:i:s') . '.' . $file->extension();

                $savedPath = Storage::disk('public')->putFileAs('reports', $file, $fileName);
            } else {
                $savedPath = $data->file_path;
            }

            $data->update([
                'title' => $dto->title ?? $data->title,
                'type' => $dto->type ?? $data->type,
                'generated_by' => $dto->generatedBy ?? $data->generated_by,
                'file_path' => $savedPath
            ]);

            return static::toResponse(
                message: 'Report Updated',
                data: new ReportResource($data)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Report Not Found', 404);
        }
    }
}