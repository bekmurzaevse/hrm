<?php

namespace App\Actions\v1\CourseAssignment;

use App\Exceptions\ApiResponseException;
use App\Models\CourseAssignment;
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
            $assignment = CourseAssignment::findOrFail($id);
            $filePath = $assignment->certificate->path;

            if (!Storage::disk('public')->exists($filePath)) {
                throw new ApiResponseException('Certificate Not Found', 404);
            }

            return Storage::disk('public')->download($filePath, $assignment->name);
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Certificate Not Found', 404);
        }
    }
}