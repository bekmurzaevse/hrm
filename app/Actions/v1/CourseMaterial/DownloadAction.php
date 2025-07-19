<?php

namespace App\Actions\v1\CourseMaterial;

use App\Dto\v1\CourseMaterial\DownloadDto;
use App\Exceptions\ApiResponseException;
use App\Models\Course;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DownloadAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\CourseMaterial\DownloadDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return StreamedResponse
     */
    public function __invoke(int $id, DownloadDto $dto): StreamedResponse
    {
        try {
            $material = Course::findOrFail($dto->courseId)
                ->materials()
                ->where('id', $id)
                ->firstOrFail();

            $filePath = $material->path;

            if (!Storage::disk('public')->exists($filePath)) {
                throw new ApiResponseException('Course Material Not Found', 404);
            }

            return Storage::disk('public')->download($filePath, $material->name);
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Course Material Not Found', 404);
        }
    }
}