<?php

namespace App\Actions\v1\HrOrder;

use App\Dto\v1\HrOrder\DownloadDto;
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
     * @param \App\Dto\v1\HrOrder\DownloadDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return StreamedResponse
     */
    public function __invoke(int $id, DownloadDto $dto): StreamedResponse
    {
        try {
            $hrOrder = User::findOrFail($dto->userId)
                ->hrOrders()
                ->where('id', $id)
                ->firstOrFail();

            $filePath = $hrOrder->path;

            if (!Storage::disk('public')->exists($filePath)) {
                throw new ApiResponseException('Hr Order Not Found', 404);
            }

            return Storage::disk('public')->download($filePath, $hrOrder->name);
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Hr Order Not Found', 404);
        }
    }
}
