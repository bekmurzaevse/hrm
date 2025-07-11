<?php

namespace App\Actions\v1\Report;

use App\Exceptions\ApiResponseException;
use App\Models\Report;
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
            $data = Report::findOrFail($id);

            if (Storage::disk('public')->exists($data->file_path)) {
                Storage::disk('public')->delete($data->file_path);
            }

            $data->delete();

            return static::toResponse(
                message: 'Report Deleted',
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Report Not Found', 404);
        }
    }
}