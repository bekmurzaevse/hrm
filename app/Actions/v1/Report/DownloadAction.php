<?php

namespace App\Actions\v1\Report;

use App\Exceptions\ApiResponseException;
use App\Models\Report;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;


class DownloadAction
{
    use ResponseTrait;

    public function __invoke(int $id): StreamedResponse
    {
        try {
            $report = Report::findOrFail($id);
            $filePath = $report->file_path;

            if (!Storage::disk('public')->exists($filePath)) {
                throw new ApiResponseException('Document Not Found', 404);
            }

            return Storage::disk('public')->download($filePath, $report->name);
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Document Not Found', 404);
        }
    }
}