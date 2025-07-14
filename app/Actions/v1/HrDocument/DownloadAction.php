<?php

namespace App\Actions\v1\HrDocument;

use App\Exceptions\ApiResponseException;
use App\Models\User;
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
     * @throws \App\Exceptions\ApiResponseException
     * @return StreamedResponse
     */
    public function __invoke(int $id): StreamedResponse
    {
        try {
            $hrDocument = User::firstOrFail()
                ->hrDocuments()
                ->where('id', $id)
                ->firstOrFail();

            $filePath = $hrDocument->path;

            if (!Storage::disk('public')->exists($filePath)) {
                throw new ApiResponseException('Hr Document Not Found', 404);
            }

            return Storage::disk('public')->download($filePath, $hrDocument->name);
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Hr Document Not Found', 404);
        }
    }
}
